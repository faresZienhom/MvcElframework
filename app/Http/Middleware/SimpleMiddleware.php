<?php
namespace App\Http\Middleware;

use Contracts\Middleware\Contract;

class SimpleMiddleware implements Contract
{
    /**
     * @param mixed $request
     * @param mixed $next
     *
     * @return mixed
     */
    public function handle($request, $next,...$role)
    {


        // var_dump(value: $role[0]);

        // if(2 == 2){
        //     header('Location: '.url('/about'));
        //     exit;
        // }

        return $next($request);


         }
}
