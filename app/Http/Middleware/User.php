<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {



     try{
      if ($this->auth->user()->type !== "user" && $this->auth->user()->status !== "pending") {
        abort(403, 'Unauthorized action.');
      }
     }catch(Exception $e){
      return redirect('/auth/login-basic');
     }

      return $next($request);


    }
}
