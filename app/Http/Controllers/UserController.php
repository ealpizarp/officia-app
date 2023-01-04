<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form

    /*
    protected $fillable = [
        'legal_id',
        'name',
        'last_names',
        'phone_number',
        'email',
        'password',
        'type',
        'available',
        'profile_photo',
        'verification_photo',
        'address_id',
    ];
    */

    public function create() {
        return view('users.register');
    }


    public function admin()
    {
        return view('users.admin_index', [
            'users' => User::Latest()->paginate(10)
        ]);
    }

    public function user_index(){

        $users = User::with('address')->get();

        return view('users.admin_index', ['users' => $users]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required | confirmed | min:8'
        ]);

        //Password Hashing

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
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

            if ( $user->role === "admin" ) {
                return redirect(route('dashboard'));
            }
            else if ( $user->role === "user" ) {
                return redirect('/')->with("message", 'You are logged in!');
            }  
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}
