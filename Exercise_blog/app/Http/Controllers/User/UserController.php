<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Model\Setup\DepartmentModel as Departmnt;
use App\Model\Setup\DivisionModel as DivisionModel;
use App\Model\Setup\CommponConfigModel as CcModel;
use App\Model\User\RoleModel as RoleModel;
use App\Model\User\UserModel as User;
use App\Http\Requests\UserRequest;
use mjanssen\BreadcrumbsBundle\Breadcrumbs;
use narutimateum\Toastr\Facades\Toastr;
use App\Fileentry;
use Riesenia\Kendo\Kendo;
use App\KendoModel as kds;
use Session;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
class UserController extends Controller
{
    public $kds;
    public $lang;
    public function __construct()
    {
        $this->middleware('auth');
        $this->lang = Session::get("locale");
        if (!isset($this->lang)) {
            $this->lang = config('app.locale');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Assets::add(['kendoui/kendo.common.min.css',
            'kendoui/kendo.default.min.css',
            'kendoui/kendo.all.min.js'
        ]);
        // breadcrumbs
        Breadcrumbs::addBreadcrumb('Security', 'user');
        Breadcrumbs::addBreadcrumb("User ", '#');

        $transport_read_data = Kendo::createRead()
            ->setUrl('/user/read')
            ->setContentType('application/json')
            ->setType('POST');

        $transport_data = Kendo::createTransport()
            ->setRead($transport_read_data)
            ->setParameterMap(Kendo::js('function(data) { return kendo.stringify(data); }'));

        $model_data = Kendo::createModel()
            ->setId('id');

        $schema_data = Kendo::createSchema()
            ->setData('data')
            ->setModel($model_data)
            ->setTotal('total');

        $dataSource_data = Kendo::createDataSource()
            ->setTransport($transport_data)
            ->setSchema($schema_data)
            ->setPageSize(config('app_config.num_paging_row'))
            ->setServerSorting(true)
            ->setServerPaging(true)
            ->setServerFiltering(true);

        $pageable = Kendo::createPageable();
        $pageable->setRefresh(true)
            ->setPageSizes(config('app_config.grid_page_size'))
            ->setButtonCount(5);

        $grid_data = Kendo::createGrid('#grid_center')
            ->setDataSource($dataSource_data)
            ->setHeight(500)
            ->setScrollable(true)
            ->setSelectable('row')
            ->setSortable(true)
            ->setResizable(true)
            ->setFilterable(true)
            ->setPageable($pageable)
            ->setColumns([
                ['field' => 'name', 'title' => 'User Full Name', 'width' => "140px"],
                ['field' => 'email', 'title' => 'Login ID', 'width' => "120px"]
            ]);

        $command_permission = ["click" => Kendo::js('commandPermission'), "text" => "Permission"];
        $command[] = $command_permission;
        $command_edit = ["click" => Kendo::js('commandEdit'), "text" => "Edit"];
        $command[] = $command_edit;
        $command_del = ["click" => Kendo::js('commandDelete'), "text" => "Delete"];
        $command[] = $command_del;
        $grid_data->addColumns(null, ['command' => $command, 'title' => "&nbsp;", 'width' => "250px"]);

        $data = ['grid_data' => $grid_data];
        return view('user.list',$data);
    }

    public function read()
    {
        $request = json_decode(file_get_contents('php://input'));
        // default sorting
        $table = 'users';
        $properties = array(
            'name',
            'email'
        );
        $this->kds = new kds;
        $data = $this->kds->read($table, $properties, $request);
        return response(json_encode($data))
            ->header('Content-Type', 'application/json');
    }

    public function create()
    {
        \Assets::add(['plugins/forms/validation/validate.min.js',
            'plugins/forms/styling/uniform.min.js',
            'plugins/ui/moment/moment.min.js',
            'plugins/pickers/daterangepicker.js',
            'plugins/jquery.relatedselects.js',
            'plugins/forms/selects/select2.min.js',
            'app/user_form_validation.js'
        ]);

        // breadcrumbs
        Breadcrumbs::addBreadcrumb('Security', '/user');
        Breadcrumbs::addBreadcrumb('User', '/user');
        Breadcrumbs::addBreadcrumb('Add', '#');

        $data = [];
        $data = array_merge($data, $this->_getBasicData());
        $data['assignedRole'] = [];
//        $savedData = $this->_getSavedUserBasicData();
//        dd($data);
//        $data = array_merge($data, $savedData);
        $roles = new RoleModel;
        $data['allRoles'] = $roles->getAllList();
//        dd($data['allRoles']);
        return view('user.create')->with($data);
    }
    public function store(UserRequest $request){
        try{
            $user = $this->_registerUser($request);
            $userInfo = User::findOrFail($user->id);
            $userInfo->created_by = Session::get('sess_user_id');
            $userInfo->update($request->all());

            $this->uploadPhoto($request, $user->id);
            // save user roles
            $userRoleIds = $request->input('assigned_roles_list');
            $user->roles()->sync($userRoleIds);
            Toastr::success(config('app_config.msg_save'), "Save", $options = []);

            return redirect('user/create');
        } catch (\Exception $e) {

            Toastr::error(config('app_config.msg_failed_save'), "Save Failed", $options = []);

            return redirect('user/create')
                ->with('dangerMsg', $e->getMessage());
        }
    }

    public function _getBasicData(){
        // get basic data
        $deprtmnt = new Departmnt;
        $data['deprtmntList'] = $deprtmnt->getAllDeprtmntList();
        $division = new DivisionModel;
        $data['divisionList'] = $division->getAllDivisionList($this->lang);
        $cConfig = new CcModel;
        $data['designation'] = $cConfig->getAllCommonConfigList('cc_designation',$this->lang);
        $data['marital_status'] = $cConfig->getAllCommonConfigMaritalStatusList('cc_maritus_status',$this->lang);
        return $data;

    }
    public function _getSavedUserBasicData(){

    }

    private function _registerUser($request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // check user activation status
        if ($request->input('status') == 1) {
            $activation = true;
        } else {
            $activation = false;
        }

        if ($user = Sentinel::register($credentials, $activation)) {
            return $user;
        }
        return false;
    }


    public function uploadPhoto($request, $id)
    {
        $file = $request->file('user_photo');
        if (!empty($file)) {
            $uploadPath = config('app_config.user_upload_photo_path') . "$id/";
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadPath), $fileName);
            $uploadFile = $uploadPath . $fileName;
            // update path
            $entry = User::find($id);
            $entry->user_photo = $uploadFile;
            $entry->save();
        }
    }

    public function uploadSign($request, $id)
    {
        $file = $request->file('user_sign');
        if (!empty($file)) {
            $uploadPath = config('app_config.user_upload_sign_path') . "$id/";
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadPath), $fileName);
            $uploadFile = $uploadPath . $fileName;
            // update path
            $entry = User::find($id);
            $entry->user_sign = $uploadFile;
            $entry->save();
        }
    }
}
