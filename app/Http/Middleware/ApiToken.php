<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class ApiToken
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
        $api_token = $request->header('authorization');
        //controllo che il campo nella colonna api_token non sia NULL
        if(empty($api_token)){
            return response()->json([
                'success' => false,
                'error' => 'Non sei autenticato'
            ]);
        }

        //tolgo la parola Bearer piu lo spazio che sono 7 caratteri
        $api_token = subtr($api_token, 7);
        $user = User::where('api_token', $api_token)->first();

        if(!$user){
            return response()->json([
                'success' => false,
                'error' => 'Non sei autenticato'
            ]);
        }

        return $next($request);
    }
}
