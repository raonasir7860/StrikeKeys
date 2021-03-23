<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Toastr;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

      public function adminHome()
    {
        $users = User::where('is_admin', 0)->orderBy("id","desc")->get();       
        return view('adminHome',compact('users'));
    }
    public function create_user()
    {
        return view('create_user');
    }
        public function store_user(Request $request)
    {
        $this->validate(
            $request,
            [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric', 'min:11',],
            ]
        );
        $image = null;
        if($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images/users'), $filename);
        $image = $request->file('image')->getClientOriginalName();
        }
        if (!empty($image)) {
        User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'image' => $image,
            'is_admin' => 0,
            'password' => Hash::make($request['password']),
        ]);
    }
        else{
            User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'is_admin' => 0,
            'password' => Hash::make($request['password']),
        ]);
        }
         Toastr::success('message','User Created Successfully');  
             return Redirect::to('admin/home');
    }
    public function edit_user($user)
    {
        $user = User::find($user);
        return view('edit_user',compact('user'));
    }
         public function update_user(Request $request,$user)
    {
         $this->validate(
            $request,
           [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'phone_number' => 'required'            ]
        );
         $image = null;
           if($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images/users'), $filename);
        $image = $request->file('image')->getClientOriginalName();
        }
        if (!empty($image)) {
        $user = User::find($user);
        $user->fname  = $request->get('fname');
        $user->lname  = $request->get('lname');
        $user->email  = $request->get('email');
        $user->phone_number  = $request->get('phone_number');
        $user->image  = $image;
        $user ->save();
        }
        else{
        $user = User::find($user);
        $user->fname  = $request->get('fname');
        $user->lname  = $request->get('lname');
        $user->email  = $request->get('email');
        $user->phone_number  = $request->get('phone_number');
        $user ->save(); 
        }

        Toastr::success('message','User Profile Updated Successfully');  
       return Redirect::to('/admin/home');
    }
        public function profile_update(Request $request,$user)
    {
         $this->validate(
            $request,
           [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'phone_number' => 'required'            ]
        );
         $image = null;
           if($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images/users'), $filename);
        $image = $request->file('image')->getClientOriginalName();
    }
        if (!empty($image)) {
        $user = User::find($user);
        $user->fname  = $request->get('fname');
        $user->lname  = $request->get('lname');
        $user->email  = $request->get('email');
        $user->phone_number  = $request->get('phone_number');
        $user->image  = $image;
        $user ->save();
        }
        else{
        $user = User::find($user);
        $user->fname  = $request->get('fname');
        $user->lname  = $request->get('lname');
        $user->email  = $request->get('email');
        $user->phone_number  = $request->get('phone_number');
        $user ->save(); 
        }
        Toastr::success('message','User Profile Updated Successfully');  
       return Redirect::to('/home');
    }

       public function destroy($id)
    {
        $delete = User::where('id', $id)->delete();
        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "User Deleted Successfully";
        } else {
            $success = true;
            $message = "User Not Found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function admin_profile()
    {
        return view('admin_profile');
    }
}
