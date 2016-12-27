<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Model\User\AccessLogModel;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests;
use session;


class LoginController extends Controller
{
    public function index(){
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

//                $user_center = IdsccenterModel::find($auth->idsc_center_id);
//                Session::set("sess_user_center_name", $user_center->center_name);
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

    public function logout(){
        dd("ddsf");
    }
}
