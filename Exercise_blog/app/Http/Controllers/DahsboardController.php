<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use mjanssen\BreadcrumbsBundle\Breadcrumbs;

class DahsboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth', ['only' => ['fooAction', 'barAction']]);
        $this->middleware('auth', ['except' => ['fooAction', 'barAction']]);
    }

    public function index()
    {
        // breadcrumbs
        Breadcrumbs::addBreadcrumb('Dashboard', '#');

        return view('dashboard');
    }

}
