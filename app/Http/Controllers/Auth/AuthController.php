<?php
namespace App\Http\Controllers\Auth;  //folder Path
use App\Http\Controllers\Controller;  //Default Controller link Must Be Need
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   //For Auth
use Session;  
use App\Models\User;  
use App\Models\User_role; 
use Hash;   //Hash Code
  
class AuthController extends Controller
{
    
    public function index()
    {
        if(Auth::check()){
            return redirect("admin/dashboard")->withSuccess('Great! You have Successfully loggedin');
        }
        return view('backend.auth.login');
    }  

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('Oppes! You have entered invalid credentials');
        }

        return redirect("admin/login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function registration()
    {
        $data['role_list']=User_role::all();
        return view('backend.auth.registration', $data);
    }

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'role_id' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        return redirect("admin/dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    {
      User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'role_id' => $data['role_id'],
        'password' => Hash::make($data['password'])
    ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('backend/dashboard');
        }
        return redirect("admin/login")->withSuccess('Opps! You do not have access');
    }

    public function userList()
    {
        if(Auth::check()){
            $user = User::get();
            return view('backend/user/listingPage', compact('user'));
        }
        return redirect("admin/login")->withSuccess('Opps! You do not have access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login');
    }
      






















}