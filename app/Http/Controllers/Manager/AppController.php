<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth','authorize.user.access:Admin@Manager']);
    }
    
    public function index()
    {
        return "This is Manager Area";
    }
}
