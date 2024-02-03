<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\Blog;
use App\Models\User;
use App\Events\PostCreated;
use App\Events\NewNotificationEvent;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::get();
        if(Gate::allows('isAdmin', $blog)){ //allows,cannot,canany
            return view('backend/blog/listing', compact('blog'));
            //abort(103,"You are not Allow.");
        }
        
    } 

    public function create()
    {
        return view('backend/blog/create');
    }

    public function saveblog(Request $request)
    {
        $userId = Auth::id();
        $user=User::where('id',$userId)->first();
        
        $request->validate([
            'title' => 'required',
            'discription' => 'required'
        ]);
        

          Blog::create([
            'title' => $request->title,  
            'description' => $request->discription,
            'status' => 1
        ]);
       
        //$email='nilkantamandal@gmail.com';
        $email=$user->email;
        event(new NewNotificationEvent($email));

        return redirect("admin/add")->withSuccess('Great! You have Successfully Save');
    }

    public function edit(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        return view('backend/blog/edit', compact('blog'));
    }

    public function update(Request $request)
    {
        $blog = Blog::findOrFail($request->id);

        $request->validate([
            'title' => 'required',
            'discription' => 'required'
        ]);

        $blog->update([
            'title' => $request->title,  
            'description' => $request->discription,
            'status' => 1
        ]);

        return redirect()->route('blogList')->with('success', 'Blog post updated successfully.');
    }


    public function delete(Request $request)
    {
     Blog::where('id', '=', $request->id)->delete();
     return redirect("admin/blogList")->withSuccess('Great! You have Successfully Delete');
    }

    public function sendWelcomeEmail()
    {
        $userEmail = 'user@example.com';

        Mail::to($userEmail)->send(new WelcomeMail());

        return "Welcome email sent successfully!";
    }

    /*
    MAIL_MAILER=smtp
    MAIL_HOST=your_smtp_host
    MAIL_PORT=your_smtp_port
    MAIL_USERNAME=your_smtp_username
    MAIL_PASSWORD=your_smtp_password
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=your_email@example.com
    MAIL_FROM_NAME="${APP_NAME}"
    */

    
}
