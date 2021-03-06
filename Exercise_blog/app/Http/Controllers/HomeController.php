<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Model\User\AccessLogModel;
use Illuminate\Support\Facades\Session;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public $lang;

    public function __construct()
    {
        $this->lang = Session::get("locale");
        if (!isset($this->lang)) {
            $this->lang = config('app.locale');
        }
    }

    /**
     * Display a login page
     *
     * @return  Web Login view
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param  LoginRequest   $request
     * @param  AccessLogModel $accessLog
     * @return mixed
     */
    public function logincheck(LoginRequest $request, AccessLogModel $accessLog)
    {      

        $credentials = [
			'email'    => trim($request->input('email')),
			'password' => $request->input('password'),
        ];
        $remember = ($request->input('email') == 'yes') ? true : false;

        try {
            if ($auth = Sentinel::authenticate($credentials, $remember)) {
                //return 'auth success';
                Session::set("user_auth", $auth);
                Session::set("sess_user_id", $auth->id);
                Session::set("sess_user_desg_id", $auth->designation_id);
                Session::set('sess_user_type', $auth->user_type);
                Session::set('sess_factory_id', $auth->factory_id); //temporary?
                Session::set('sess_office_id', $auth->office_id); //temporary?
                //Session::set("sess_user_district_id", $auth->district_id);
                Session::set("sess_user_full_name", $auth->full_name);
                //Session::set("sess_user_image", $auth->user_photo);

                // save access log
                $accessLog->saveAccesslog();

                return redirect('/dashboard');

            } else {
                throw new \Exception('Invalid username or password. Try again !!!');
            }
        } catch (Cartalyst\Sentinel\Checkpoints\ThrottlingException $ex) {
            //echo "Too many attempts!";
            return redirect()->back()
                ->withInput()
                ->withErrors("Too many attempts!");

        } catch (Cartalyst\Sentinel\Checkpoints\NotActivatedException $ex) {
            return redirect()->back()
                ->withInput()
                ->withErrors("Please activate your account before trying to log in");

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Logout
     * @param  AccessLogModel $accessLog Model.
     * @return mixed                     Data with Headers.
     */
    public function logout(AccessLogModel $accessLog)
    {
        // save access log
        $accessLog->updateAccesslog();

        Sentinel::logout(null, true);
        Session::flush();
        Session::regenerate();
        return redirect('/')
            ->header('Last-Modified', gmdate("D, d M Y H:i:s") . " GMT")
            ->header('Cache-Control', "no-store, no-cache, must-revalidate")
            ->header('Cache-Control: post-check=0, pre-check=0', false)
            ->header('Pragma', "no-cache");
    }
}
