<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Default dashboard
     */
    public function userDashboard() {
        return new Response(['Welcome']);
    }
}
