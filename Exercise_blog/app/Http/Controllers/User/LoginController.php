<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\LoginRequest;
use App\Model\User\AccessLogModel;
use App\Model\Setup\DepartmentModel;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        return view('user.login');
    }

    public function logincheck(LoginRequest $request, AccessLogModel $accessLog)
    {
        //return redirect('/dashboard');
        $credentials = [
            'email' => trim($request->input('email')),
            'password' => $request->input('password'),
        ];
        $remember = ($request->input('email') == 'yes') ? true : false;

        try {
            if ($auth = Sentinel::authenticate($credentials, $remember)) {
                //return 'auth success';
                Session::set("user_auth", $auth);
                Session::set("sess_user_id", $auth->id);
                Session::set("sess_user_dept_id", $auth->department_id);
                Session::set("sess_user_desg_id", $auth->designation_id);
                Session::set("sess_user_full_name", $auth->full_name);
                Session::set("sess_user_image", $auth->user_photo);
                Session::set("sess_office_id", $auth->office_id);

                $user_center = DepartmentModel::find($auth->department_id);
                Session::set("sess_user_department_name", $user_center->code);
                // save access log
                $accessLog->saveAccesslog();
                return redirect('/dashboard');
            } else {
                throw new \Exception('Invalid Username or Password. Try again !!!');
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
