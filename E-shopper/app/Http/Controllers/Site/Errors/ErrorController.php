<?php

namespace App\Http\Controllers\Site\Errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index(){
        return view('errors.404');
    }
}
