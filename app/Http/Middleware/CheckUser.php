<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   //When used Auth Check
use Session;
class CheckUser
{
    
    public function handle(Request $request, Closure $next) {
        if (Auth::check())  {
          return $next($request);
        } else {
          return Redirect('admin/login');
        }
      }
}
