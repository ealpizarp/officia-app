<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    //Show all listings

    public function index()
    {
        return view('listings.guest_index', [
            'listings' => Listing::Latest()->filter(
                request(['tag', 'search'])
            )
                ->paginate(6)
        ]);
    }

    

    public function admin()
    {
        return view('listings.admin_index', [
            'listings' => Listing::Latest()->filter(
                request(['tag', 'search'])
            )
                ->paginate(6)
        ]);
    }

    //Show single listing

    public function show(Listing $listing)
    {

        return view('listings.guest_show', [
            'listing' => $listing
        ]);
    }

    public function show_admin(Listing $listing)
    {

        return view('listings.admin_show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
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

        Listing::create($formFields);


        return redirect('/dashboard')->with('message', 'Ad published succesfully!');
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
