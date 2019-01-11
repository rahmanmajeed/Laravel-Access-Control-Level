<?php

namespace App\Http\Controllers\ADMIN;

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
}
