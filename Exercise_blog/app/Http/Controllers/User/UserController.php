<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use mjanssen\BreadcrumbsBundle\Breadcrumbs;
use narutimateum\Toastr\Facades\Toastr;
use App\Fileentry;
use Riesenia\Kendo\Kendo;
use App\KendoModel as kds;
class UserController extends Controller
{
    public $kds;

    public function __construct()
    {
        $this->middleware('auth');
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
            'app/user_form_validation.js',
            'pages/form_checkboxes_radios.js'
        ]);

        // breadcrumbs
        Breadcrumbs::addBreadcrumb('Security', '/user');
        Breadcrumbs::addBreadcrumb('User', '/user');
        Breadcrumbs::addBreadcrumb('Add', '#');

        $data = [];

        return view('user.create')->with($data);
    }
    public function store(){
        try{

            Toastr::success(config('app_config.msg_save'), "Save", $options = []);

            return redirect('user/create');
        } catch (\Exception $e) {

            Toastr::error(config('app_config.msg_failed_save'), "Save Failed", $options = []);

            return redirect('user/create')
                ->with('dangerMsg', $e->getMessage());
        }
    }
}
