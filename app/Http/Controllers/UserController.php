<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form

    public function create() {
        return view('users.register', [
            'provinces' => Province::all()
        ]);
    }


    public function admin() {
        $users = User::with(['address'])->paginate(15);
        $provinces = Province::all();

        return view('users.admin_index', [
            'users' => $users,
            'provinces' => $provinces
        ]);
    }

    public function user_index(){

        $users = User::with(['address'])->paginate(15);
        $provinces = Province::all();

        return view('users.user_index', 
        ['users' => $users,
        'provinces' => $provinces]);
    }

    public function guest_index(){

        $users = User::with(['address'])->paginate(15);
        $provinces = Province::all();

        return view('users.guest_index', 
        ['users' => $users,
        'provinces' => $provinces]);
    }

    public function store(Request $request) {

        $formFields = $request->validate([
            'legal_id' => 'required',
            'name' => 'required',
            'last_names' => 'required',
            'phone_number' => ['required', 'min:8', 'max:9'],
            'email' => ['required','email', Rule::unique('user','email')],
            'password' => 'required | confirmed | min:8',
            'address_id' => 'required',
        ]);

        //Password Hashing
        $formFields['password'] = bcrypt($formFields['password']);

        if ($request->hasFile('profile_photo')) {
            $formFields['profile_photo'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('verification_photo')) {
            $formFields['verification_photo'] = $request->file('image')->store('images', 'public');
        }

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'legal_id' => 'required',
            'name' => 'required',
            'last_names' => 'required',
            'phone_number' => ['required', 'min:8', 'max:9'],
            'email' => ['required','email'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $formFields['profile_photo'] = $request->file('profile_photo')->store('images', 'public');
        }

        if($request->password) {
            $formFields['password'] = $request->password;
        }

        if($request->address_id) {
            $formFields['address_id'] = $request->address_id;
        }

        $user->update($formFields);


        return back()->with('message', 'User updated succesfully!');
    }


    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user, 'provinces' => Province::all()]);
    }
    //Logout user

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have logged out');
    }

    //Login user
    public function login() {
        return view('users.login');
    }

    //Authenticate user

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);


        if(auth()->attempt($formFields)) {
            $user = auth()->user();
            $request->session()->regenerate();

            if ( $user->type === 1 ) {
                return redirect(route('dashboard'));
            }
            else if ( $user->type === 0 ) {
                return redirect('/user')->with("message", 'You are logged in!');
            }  
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('/dashboard')->with(["message" => "User deleted succesfully!"]);
    }

    public function show(User $user)
    {

        return view('listings.guest_show', [
            'user' => $user
        ]);
    }

}
