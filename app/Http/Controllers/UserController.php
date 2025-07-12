<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Hash;
use DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(){
         if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function store(Request $request){
    //  dd($request->all());
        
        $request->validate([
           'user_name'=>'required',
           'email'=>'email|required|Unique:Users',
           'password' => 'required|min:8|confirmed',
           'mob'=>'required',
           'img'=>'nullable|image|mimes:jprg,png,jpg,gif|max:2048'

        ],[
            'user_name.required'=>"Full Name is required.",
            'email.required'=>"Email id is required",
            'password.confirmed'=>"Please confirm your password.",
        ]);
            
            $imgPath = '/public/uploads/images/user.png';
    
            $users = new User();
            $users->name = $request->user_name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->phone = $request->mob;
            $users->role = 'User';
            $users->image = $imgPath;
            $users->save();
            
            if($users){
               return redirect('login')->with('success','Users details added successfully!');
            }
            else{
                return back()->with('error','Users details not added successfully!');
            }
        
       }
       public function custom_login(Request $request)
         {
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {

                    $request->session()->regenerate();

                    if (Auth::user()->role == "Admin") {
                        return redirect('dashboard')->with('success', 'Admin logged in successfully!');
                    } else {
                        return redirect('/')->with('success', 'User logged in successfully!');
                    }
                }

                return back()->with('error', 'Your email or password is invalid!');
            }

         public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
             $request->session()->regenerateTokens(); 
             return redirect('login')->with('success', 'You are logout successfully!');
         }


         //users
           public function getUser(){
             $users = User::orderBy('name', 'asc')->paginate(5);
              return view('user',['users'=>$users]);
           }

           public function add_user(){
            //   echo "add user function"; 
              
              return view('add_user');

           }
            public function store_user(Request $request){
            
                
                $request->validate([
                'user_name'=>'required',
                'email'=>'email|required|Unique:Users',
                'password' => 'required|min:8|confirmed',
                'mob'=>'required',
                'role'=>'required',
                'img'=>'nullable|image|mimes:jprg,png,jpg,gif|max:2048',

                ],[
                    'user_name.required'=>"Full Name is required.",
                    'email.required'=>"Email id is required",
                    'password.confirmed'=>"Please confirm your password.",
                ]);

               $imgPath = null;
                
            //    if ($request->hasFile('img')) {
            //     $image = $request->file('img');

            //     // Get original file name
            //     $originalName = $image->getClientOriginalName(); // e.g. user_photo.jpg

            //     // Optionally add timestamp to avoid name conflicts
            //     // $filename = time() . '_' . $originalName;

            //     // Move to storage/app/public
            //     $image->storeAs('public', $originalName);

            //     // Save filename to DB
            //     $imgPath = $originalName;
            //   }

              
               if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('/public/uploads/images');
              }
                        
                        
                    $users = new User();
                    $users->name = $request->user_name;
                    $users->email = $request->email;
                    $users->password = Hash::make($request->password);
                    $users->phone = $request->mob;
                    $users->role = $request->role;
                    $users->image = $imgPath;
                    // dd($request->url().$users->image);
                    
                    $users->save();
                    //  dd($request->all());
                    if($users){
                       return redirect('user')->with('success','Users details added successfully!');
                    }
                    else{
                        return back()->with('error','Users details not added successfully!');
                    }
                
            }
           public function update_image(Request $request, $id)
        {
            
            $user = User::find($id);

            if (!$user) {
                return back()->with('error', 'User not found.');
            }

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $path = $image->store('public');
                $imgArray = explode("/", $path);
                $imgPath = $imgArray[1] ?? null;
                dd($imgPath);
                if ($imgPath) {
                    $user->image = $imgPath;
                    if ($user->save()) {
                        return back()->with('success', 'User image updated successfully!');
                    } else {
                        return back()->with('error', 'Image update failed.');
                    }
                }
            }

            return back()->with('error', 'No image uploaded.');
        }


       
}