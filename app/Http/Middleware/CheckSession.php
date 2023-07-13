<?php

namespace App\Http\Middleware;

use App\Models\RefreshToken;
use App\User;
use Closure;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('Phone',session('Phone'))->first();
        $token = RefreshToken::where('Username',$user->Username)->first();
        if($token->LoginWeb != session('User-Agent')){
            Session::flush();
            return redirect()->to(route('home'));
        }
        return $next($request);
    }
}
