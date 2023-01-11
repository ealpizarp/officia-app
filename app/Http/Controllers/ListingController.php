<?php
namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Listing;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Category;
use App\Models\Reviews;
use App\Models\Image;
use App\Models\Subcategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{

    //Show all listings

    public function index()
    {
        return view('listings.guest_index', [
            'listings' => Service::with(['address','user','subcategory'])->filter(
                request(['search'])
            )->paginate(15)
        ]);
    }

    public function user()
    {
        return view('listings.user_index', [
            'listings' => Service::with(['address','user','subcategory'])->filter(
                request(['search'])
            )->paginate(15)
        ]);

    }

    

    public function admin()
    {
        return view('listings.admin_index', [
            'listings' => Service::with(['address','user','subcategory'])->filter(
                request(['search'])
            )->paginate(15)
        ]);
    }

    //Show single listing

    public function show(Service $listing)
    {

        $serviceComplete = Service::with(['address','user','subcategory'])->where('id','=',$listing->id)->first();

        $subcategory = Subcategory::with(['category'])->where('id','=',$listing->subcategory_id)->first();
        $address = Address::with(['province'])->where('id','=',$listing->address_id)->first();

        $stars_avg = DB::table('reviews')
                        ->selectRaw('num_stars, count(num_stars)/(select count(body) from reviews)*100 as average')
                        ->where('service_id', '=',$listing->id)
                        ->groupBy('num_stars')
                        ->orderBy('num_stars')
                        ->get();

        $reviews = Reviews::with(['user'])->where('service_id','=',$listing->id)->get();

        return view('listings.guest_show', [
            'listing' => $serviceComplete,
            'address' => $address,
            'subcategory' => $subcategory,
            'stars_average' => $stars_avg,
            'reviews' => $reviews
        ]);
    }

    public function show_admin(Service $listing)
    {
        $serviceComplete = Service::with(['address','user','subcategory'])->where('id','=',$listing->id)->first();

        $subcategory = Subcategory::with(['category'])->where('id','=',$listing->subcategory_id)->first();
        $address = Address::with(['province'])->where('id','=',$listing->address_id)->first();

        $stars_avg = DB::table('reviews')
                        ->selectRaw('num_stars, count(num_stars)/(select count(body) from reviews)*100 as average')
                        ->where('service_id', '=',$listing->id)
                        ->groupBy('num_stars')
                        ->orderBy('num_stars')
                        ->get();

        $reviews = Reviews::with(['user'])->where('service_id','=',$listing->id)->get();  

        return view('listings.admin_show', [
            'listing' => $serviceComplete,
            'address' => $address,
            'subcategory' => $subcategory,
            'stars_average' => $stars_avg,
            'reviews' => $reviews
        ]);
    }

    public function show_user(Service $listing)
    {
        $serviceComplete = Service::with(['address','user','subcategory'])->where('id','=',$listing->id)->first();

        $subcategory = Subcategory::with(['category'])->where('id','=',$listing->subcategory_id)->first();
        $address = Address::with(['province'])->where('id','=',$listing->address_id)->first();

        $stars_avg = DB::table('reviews')
                        ->selectRaw('num_stars, count(num_stars)/(select count(body) from reviews)*100 as average')
                        ->where('service_id', '=',$listing->id)
                        ->groupBy('num_stars')
                        ->orderBy('num_stars')
                        ->get();

        $reviews = Reviews::with(['user'])->where('service_id','=',$listing->id)->get();


        return view('listings.user_show', [
            'listing' => $serviceComplete,
            'address' => $address,
            'subcategory' => $subcategory,
            'stars_average' => $stars_avg,
            'reviews' => $reviews
        ]);
    }

    public function create()
    {
        return view('listings.create', [
            'provinces' => Province::all(), 'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
              

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'reasons_to_choose' => 'required',
            'locations_directions' => 'required',
            'address_id' => 'required',
            'subcategory_id' => 'required',
            'user_id' => 'required'
        ]);

        if (!$request->free_diagnosis) {
            $formFields['free_diagnosis'] = 0;
        } else {
            $formFields['free_diagnosis'] = 1;
        }

        if (!$request->warranty) {
            $formFields['warranty'] = 0;
        } else {
            $formFields['warranty'] = 1;
        }

        $service = Service::create($formFields);

        if ($request->images) {

            foreach ($request->images as $image) {
            

                $new_image['path_name']=$image->store('images', 'public');
                $new_image['service_id']=$service->id;
    
                Image::create($new_image);
    
            }
        }

        return redirect()->route("/user")->with(["mensaje" => "Service published succesfully!"]);
    }

    // Update listing data

    public function update(Request $request, Service $listing)
    {
        $formFields = $request->all();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        if (!$request->free_diagnosis) {
            $formFields['free_diagnosis'] = 0;
        }

        if (!$request->warranty) {
            $formFields['warranty'] = 0;
        }

        $listing->update($formFields);


        return back()->with('message', 'Service updated succesfully!');
    }

    //Show Edit Form

    public function edit(Service $listing)
    {

        $serviceComplete = Service::with(['address','user','subcategory'])->where('id','=',$listing->id)->first();

        return view('listings.edit', ['listing' => $serviceComplete, 
        'provinces' => Province::all(), 
        'categories' => Category::all()]);
    }

    // Delete Listing

    public function destroy(Service $listing)
    {
        $listing->delete();
        return redirect('/dashboard')->with('message', 'Listing deleted succesfully!');
    }
}
