<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth','authorize.user.access:Admin,Manager|User']);
    }
    public function index()
    {
        return "This is User Area";
    }
}
