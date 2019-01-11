<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizeUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        /**
         * use regex like [@#$%^&*-+=_;,/?.]
         * @var array
         * @var string
         */
        $split_array= array();
        $merge_array= array();

        foreach($roles as $role){
            /**
             * / = start or end of pattern string
             * [...] = group of characters
             * + = one or more of the preceeding character or group in [...]
             * \s = any whitespace character (space, tab)
             * * = zero or more of the preceeding character or group in [...]
             * . = matches any single character except a new line
             * ^ = Matches the begining of string
             */
            if(!preg_match("/[@#$%:|;\s,]+/",$role)){
                array_push($merge_array,$role);
            }
            else{
                $split_array=preg_split("/[@#$%:|;\s,]/",$role);
            }

            $merge_array=array_merge($merge_array,$split_array);
        }
        $merge_array=array_unique($merge_array);
        $roles=$merge_array;

        /**
         * check user status logged or not
         * @return json
         */
        if($request->user()===null){
            return response()->json(["error"=>"Insufficient Permission"],401);
        }

        /**
         * check user roles using hasAnyRole() method.
         * @return bool
         * 
         */
        if($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }
        return response()->json(["error"=>"Insufficient Permission"],401);
        
    }
}
