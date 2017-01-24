<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Session;
use narutimateum\Toastr\Facades\Toastr;
use mjanssen\BreadcrumbsBundle\Breadcrumbs;
class AngularjsController extends Controller
{
    public $lang;

    public function __CONSTRUCT()
    {
        $this->middleware('auth');
        $this->lang = Session::get("locale");
        if(!isset($this->lang)){
            $this->lang = config('app.locale');
        }
    }


    public function index()
    {
        \Assets::add([
            'plugins/forms/validation/validate.min.js',
            'plugins/forms/styling/uniform.min.js',
             'plugins/ui/moment/moment.min.js',
            'core/libraries/jquery.form.js',
            'icons/fontawesome/styles.min.css',
            'angularjs/angular.min.js',
        ]);
        Breadcrumbs::addBreadcrumb(trans('import.breadcrumb1'), '#');

        return view('angular.create');
    }
}
