<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Province;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    // Show Register/Create Form

    public function create() {
        return view('users.register', [
            'provinces' => Province::all()
        ]);
    }


    public function getUsers($isAdmin)
    {
        if($isAdmin)
        {
            $users = User::with(['address'])->paginate(15);

        }else{
            $users = User::with(['address'])->where('available', '=', 1)
                                            ->paginate(15);
        }

        return $users;
    }

    public function admin() {

        return view('users.admin_index', 
                    ['users' => $this->getUsers(true),]);
    }

    public function user_index(){

        return view('users.user_index', 
                    ['users' => $this->getUsers(false),]);
    }

    public function guest_index(){

        return view('users.guest_index', 
                    ['users' => $this->getUsers(false),]);
    }

    public function storePhoto($request, $user){

        if(is_null($user)){
            $image = $request->file('profile_photo');

            $input['imagename'] =  $request->legal_id.$request->_token.time().'.' .$image->extension();
        
            $destinationPath = storage_path('app/public/images/profiles');
            
            $img = Image::make($image->path());

            $img->resize(512, 512, function ($constraint) {})->save($destinationPath.'/'.$input['imagename']);

            $imagePath = 'images/profiles/'.$input['imagename'];

        }
        else{
            $image = $request->file('profile_photo');

            $input['imagename'] =  $user->profile_photo;
            $destinationPath = storage_path('app/public');
            
            //delete the actual photo
            $path = storage_path('app/public/') . $user->profile_photo;
            unlink($path);

            //save the new photo with the same name
            $img = Image::make($image->path());
            $img->resize(512, 512, function ($constraint) {})->save($destinationPath.'/'.$input['imagename']);

            $imagePath = $user->profile_photo;
        }

        return $imagePath;


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
            $formFields['profile_photo'] = $this->storePhoto($request, null);
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

        $formFields = $request->all();

        //Password
        if (is_null($formFields['password']) && is_null($formFields['password_confirmation']) ){
            $formFields['password'] = $user->password;
        }
        elseif(is_null($formFields['password']) || is_null($formFields['password_confirmation']) ){
            return back()->withErrors(['password' => 'Invalid Credentials'])->onlyInput('password');
        }
        elseif($formFields['password'] != $formFields['password_confirmation']){
            return back()->withErrors(['password' => 'The passwords must match'])->onlyInput('password');
        }
        else{
            $formFields['password'] = bcrypt($formFields['password']);
        }
        
        //dd($request->hasFile('profile_photo'), !is_null($user->profile_photo));

        //Profile photo
        if($request->hasFile('profile_photo') && (!is_null($user->profile_photo))){
            $formFields['profile_photo'] = $this->storePhoto($request, $user);
            
        }
        elseif($request->hasFile('profile_photo') && is_null($user->profile_photo)){
            $formFields['profile_photo'] = $this->storePhoto($request, null);
        }
        else{
            $formFields['profile_photo'] = $user->profile_photo;
        }

        $user->update($formFields);

        return back()->with('message', 'User updated succesfully!');
    }

    public function verify_account(Request $request, User $user)
    {
        $formFields = $user->attributesToArray();

        if ($request->hasFile('verification_photo')) {
            $formFields['verification_photo'] = $request->file('verification_photo')->store('images/verifications', 'public');
        }

        $user->update($formFields);

        $msgFields['category'] = 'Verification request';
        $msgFields['description'] = 'User '.$user->legal_id.' has requested account verification.';
        $msgFields['user_id']=$user->id;

        Notification::create($msgFields);

        return back()->with('message', 'Verification request sent succesfully!');
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

            if ($user->available === 0){
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('message', 'Sorry, this user is banned indefinitely!');
            }

            if ( $user->type === 1 ) {
                return redirect('/')->with('message', 'You are logged in!');
            }
            else if ( $user->type === 0 ) {
                return redirect('/')->with('message', 'You are logged in!');
            }  
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function destroy(User $user)
    {
        $path = storage_path('app/public/') . $user->profile_photo;
        unlink($path);
        $user->delete();
        return redirect('/')->with('message', 'User deleted succesfully!');
    }

    public function getRating($user_id, $isAdmin)
    {
        if($isAdmin){

            $rating = DB::table('service')
                        ->join('reviews','reviews.service_id','=','service.id')
                        ->join('user','user.id','=','service.user_id')
                        ->selectRaw('sum(reviews.num_stars)/count(reviews.body) as rating')
                        ->where('user.id', '=',$user_id)
                        ->first();

        }else{
            $rating = DB::table('service')
                        ->join('reviews','reviews.service_id','=','service.id')
                        ->join('user','user.id','=','service.user_id')
                        ->selectRaw('sum(reviews.num_stars)/count(reviews.body) as rating')
                        ->where('user.id', '=',$user_id)
                        ->where('user.available', '=', 1)
                        ->first();
        }

        if (is_null($rating->rating)) {
            $rating->rating = '0';
        }

        $rating= floatval($rating->rating);

        return $rating;
    }
    
    public function show(User $user)
    {
        $userComplete = User::with(['address','service'])->where('id','=',$user->id)->first();

        return view('users.show', [
            'user' => $userComplete,
            'rating' => $this->getRating($userComplete->id, false),
        ]);
    }

    

    public function user_ban(Request $request, User $user)
    {
        
        $formFields = $user->attributesToArray();
        $formFields['available'] = ($request->free_diagnosis) ? 0 : 1;
        $user->update($formFields);

        return back()->with('message', 'User updated succesfully!');
    }

}
