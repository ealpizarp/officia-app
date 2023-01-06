<?php
namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Listing;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Validation\Rule;

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

        return view('listings.guest_show', [
            'listing' => $serviceComplete,
            'address' => $address,
            'subcategory' => $subcategory
        ]);
    }

    public function show_admin(Service $listing)
    {
        $serviceComplete = Service::with(['address','user','subcategory'])->where('id','=',$listing->id)->first();

        $subcategory = Subcategory::with(['category'])->where('id','=',$listing->subcategory_id)->first();
        $address = Address::with(['province'])->where('id','=',$listing->address_id)->first();

        return view('listings.admin_show', [
            'listing' => $serviceComplete,
            'address' => $address,
            'subcategory' => $subcategory
        ]);
    }

    public function show_user(Service $listing)
    {
        $serviceComplete = Service::with(['address','user','subcategory'])->where('id','=',$listing->id)->first();

        $subcategory = Subcategory::with(['category'])->where('id','=',$listing->subcategory_id)->first();
        $address = Address::with(['province'])->where('id','=',$listing->address_id)->first();

        return view('listings.user_show', [
            'listing' => $serviceComplete,
            'address' => $address,
            'subcategory' => $subcategory
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
        // $formFields = $request->validate([
        //     'title' => 'required',
        //     'price' => 'required',
        //     'seller' => 'required',
        //     'location' => 'required',
        //     'email' => ['required', 'email'],
        //     'tags' => 'required',
        //     'description' => 'required'
        // ]);

        // if ($request->hasFile('image')) {
        //     $formFields['image'] = $request->file('image')->store('images', 'public');
        // }

        // Listing::create($formFields);


        // return redirect('/dashboard')->with('message', 'Ad published succesfully!');

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
        

        Service::create($formFields);

        return redirect()->route("/user")->with(["mensaje" => "Service published succesfully!"]);
    }

    // Update listing data

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'seller' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $listing->update($formFields);


        return back()->with('message', 'Ad updated succesfully!');
    }

    //Show Edit Form

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Delete Listing

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/dashboard')->with('message', 'Listing deleted succesfully!');
    }
}
