<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Category;
use App\Models\Reviews;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{

    //Show all listings

    public function getServices($isAdmin)
    {
        if($isAdmin)
        {
            $services = Service::with(['address','user','subcategory', 'image'])
                                ->filter(request(['search', 'address', 'subcategory']))
                                ->paginate(15);

        }else{
            $services = Service::with(['address','user','subcategory', 'image'])
                                ->whereRelation('user', 'available', '=', 1)
                                ->filter(request(['search', 'address', 'subcategory']))
                                ->paginate(15);
        }

        return $services;
    }

    public function index()
    {
        return view('listings.guest_index', [
            'listings' => $this->getServices(false)]);
    }

    public function user()
    {
        return view('listings.user_index', [
            'listings' => $this->getServices(false)]);

    }

    public function admin()
    {
        return view('listings.admin_index', [
            'listings' => $this->getServices(true)]);
    }

    //Show single listing

    public function getServiceComplete($service_id, $isAdmin)
    {
        
        if($isAdmin)
        {
            $serviceComplete = Service::with(['address','user','subcategory','image'])->where('id','=',$service_id)->first();

        }else{
            $serviceComplete = Service::with(['address','user','subcategory','image'])
                                        ->where('id','=',$service_id)
                                        ->whereRelation('user', 'available', '=', 1)
                                        ->first();
        }

        return $serviceComplete;

    }

    public function getStarsAverage($service_id, $isAdmin)
    {
        $stars_avg[1] = 0;
        $stars_avg[2] = 0;
        $stars_avg[3] = 0;
        $stars_avg[4] = 0;
        $stars_avg[5] = 0;

        if($isAdmin)
        {
            $query = DB::table('reviews')
                        ->selectRaw('num_stars, count(num_stars)/(select count(body) from reviews where service_id = ?)*100 as average', [$service_id])
                        ->where('service_id', '=',$service_id)
                        ->groupBy('num_stars')
                        ->orderBy('num_stars')
                        ->get();

        }else{
            $query = DB::table('reviews')
                        ->join('user','user.id','=','reviews.user_id')
                        ->selectRaw('reviews.num_stars, count(reviews.num_stars)/(select count(reviews.body) from reviews where reviews.service_id = ?)*100 as average', [$service_id])
                        ->where('reviews.service_id', '=', $service_id)
                        ->where('user.available', '=', 1)
                        ->groupBy('reviews.num_stars')
                        ->orderBy('reviews.num_stars')
                        ->get();
        }

        //dd($query);

        if (count($query)>0) {
            foreach ($query as $star) {
                $stars_avg[$star->num_stars]=$star->average;
            }
        }
        
        return $stars_avg;

    }

    public function getReviews($service_id, $isAdmin)
    {
        if($isAdmin)
        {
            $reviews = Reviews::with(['user'])->where('service_id','=',$service_id)
                                            ->get();

        }else{
            $reviews = Reviews::with(['user'])->where('service_id','=',$service_id)
                                            ->whereRelation('user', 'available', '=', 1)
                                            ->get();
        }

        return $reviews;

    }

    public function show(Service $listing)
    {

        return view('listings.guest_show', [
            'listing' => $this->getServiceComplete($listing->id, false),
            'stars_average' => $this->getStarsAverage($listing->id, false),
            'reviews' => $this->getReviews($listing->id, false)
        ]);
    }

    public function show_admin(Service $listing)
    {
        return view('listings.admin_show', [
            'listing' => $this->getServiceComplete($listing->id, true),
            'stars_average' => $this->getStarsAverage($listing->id, true),
            'reviews' => $this->getReviews($listing->id, true)
        ]);
    }

    public function show_user(Service $listing)
    {
        return view('listings.user_show', [
            'listing' => $this->getServiceComplete($listing->id, false),
            'stars_average' => $this->getStarsAverage($listing->id, false),
            'reviews' => $this->getReviews($listing->id, false)
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

                $new_image['path_name']=$image->store('images/services', 'public');
                $new_image['service_id']=$service->id;
    
                Image::create($new_image);
            }
        }

        return redirect('/')->with('message', 'Service published succesfully!');
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
        $images=Image::where('service_id','=',$listing->id)->get();
        foreach ($images as $image) {
            $path = storage_path('app/public/') . $image->path_name;
            unlink($path);
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted succesfully!');
    }
}
