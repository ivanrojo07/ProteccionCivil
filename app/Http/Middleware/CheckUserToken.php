<?php

namespace App\Http\Middleware;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;
use Carbon\Carbon;
use App\User;

use Closure;


class CheckUserToken
{

    public $url,$apiUrl,$imageUrl,$client;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = env('GLOBAL_API_URL');
        $this->apiUrl = $this->url.'api/auth/';
        $this->imageUrl = $this->url.'storage/';
        $this->client = new GuzzleClient(['base_uri'=>$this->apiUrl])
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

        $session_token = session()->get('user_token');
        $session_user = session()->get('user');
        if($session_token && $session_user){
            $hoy = Carbon::now()->toDateTimeString();  
            if($hoy < $session_token->expires_at){
                $user = User::updateOrCreate(
                    ['email' => $session_user->email],
                    [
                        'name' => $session_user->name, 
                        'api_token' => $session_token->access_token,
                        'expires_at'=>$session_token->expires_at
                    ]
                );
                session()->put('user_id',$user->id);
                return $next($request);
            }
            else{
                return redirect('login');
            }

        }
        else{
            // Login de prueba, más adelante debera returnar al login/Registro de clientes
            return redirect('login');
        }
        
    }

    
}
