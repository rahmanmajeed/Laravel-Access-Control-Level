<?php

namespace App\Http\Controllers\ADMIN;

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth','authorize.user.access:Admin']);
    }

    public function index()
    {
        return "This is Admin Area";
    }

    public function update(User $user)
    {
        $roles=Role::all();
        $permissions=Permission::all();
        $data = $user->roles()->get();
        return response()->json(['data'=>$data,'roles'=>$roles,'permissions'=>$permissions],201);
    }
}
