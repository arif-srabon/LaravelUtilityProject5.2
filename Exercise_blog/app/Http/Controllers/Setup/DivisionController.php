<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Riesenia\Kendo\Kendo;
use App\KendoModel as kds;
use mjanssen\BreadcrumbsBundle\Breadcrumbs;
use Illuminate\Support\Facades\App;
use narutimateum\Toastr\Facades\Toastr;
use Session;
use DB;
use Validator;
class DivisionController extends Controller
{
    public $kds;
    public function __construct(){

        $this->middleware('auth');
        $this->kds = new kds;

    }
    public function index(){

        \Assets::add(['kendoui/kendo.common.min.css',
            'kendoui/kendo.default.min.css',
            'kendoui/kendo.all.min.js'
        ]);

        Breadcrumbs::addBreadcrumb(trans('setup/division.breadcrumb1'), '#');
        Breadcrumbs::addBreadcrumb(trans('setup/division.breadcrumb2'), '/division');

        $transport_create_data = Kendo::createTransportCreate()
            ->setUrl('/division/create')
            ->setContentType('application/json')
            ->setType('POST');
        $transport_read_data = Kendo::createTransportRead()
            ->setUrl('/division/read')
            ->setContentType('application/json')
            ->setType('POST');
        $transport_update_data = Kendo::createTransportUpdate()
            ->setUrl('/division/update')
            ->setContentType('application/json')
            ->setType('POST');

        $transport_data = Kendo::createTransport()
            ->setRead($transport_read_data)
            ->setCreate($transport_create_data)
            ->setUpdate($transport_update_data)
            ->setParameterMap(Kendo::js('function(data) { return kendo.stringify(data); }'));


        $model_data = Kendo::createModel()
            ->setId('id')
            ->addField('geo_code', ['type' => 'string','validation' =>['required'=>true]])
            ->addField('name', ['type' => 'string','validation' =>['required' =>true] ])
            ->addField('name_bn', ['type' => 'string']);

        $schema_data = Kendo::createSchema()
            ->setData('data')
            ->setModel($model_data)
            ->setTotal('total');



        $dataSource_data = Kendo::createDataSource()
            ->setTransport($transport_data)
            ->setSchema($schema_data)
            ->setPageSize(config('app_config.num_paging_row'))
            ->setError(Kendo::js('onError'))
            ->setRequestEnd(Kendo::js('onRequestEnd'))
            ->setServerSorting(true)
            ->setServerPaging(true)
            ->setServerFiltering(true);



        $btnAdd =[['name' =>'create','text' =>trans('setup/division.btn_add')]];


        $pageable = Kendo::createPageable();
        $pageable->setRefresh(true)
            ->setPageSizes(config('app_config.grid_page_sizes'))
            ->setButtonCount(config('app_config.grid_button_count'));

        $grid_division = Kendo::createGrid('#grid_division')
            ->setDataSource($dataSource_data)
            ->setHeight(config('app_config.grid_height'))
            ->setEditable('inline')
            ->setSelectable('row')
            ->setSortable(true)
            ->setFilterable(true)
            ->setPageable($pageable)
            ->setColumns([
                ['field' => 'geo_code', 'title' => trans('setup/division.column_code'),'filterable' =>false,'sortable' =>false,'width'=>"8%"],
                ['field' => 'name', 'title' => trans('setup/division.column_name')],
                ['field' => 'name_bn', 'title' => trans('setup/division.column_name_bn')]
            ]);

            $grid_division->setToolbar($btnAdd);
            $command = array();
            $command[] = 'edit';
            $command_del = ["click" => Kendo::js('commandDelete'), "text" => trans('setup/division.btn_delete')];
            $command[] = $command_del;

            $grid_division->addColumns(null,['command' => $command,'title'=>"&nbsp;",'width'=>"17%"]);


        $data =['js_grid_division' =>$grid_division ];

        return view('setup.division_list', $data );
    }

public function read(){
}

    public function division_data($type)
    {

        $request = json_decode(file_get_contents('php://input'));

        $columns = array('id', 'geo_code', 'name', 'name_bn');

        switch($type) {
            case 'create':

                $columns[] = 'created_by';
                $request->created_by = Session::get('sess_user_id');
                $columns[] = 'created_at';
                $request->created_at = date('Y-m-d H:i:s');

//                $v = Validator::make($request, [
//                    'geo_code' => 'required|max:6'
//                ]);
//
//                if ($v->fails())
//                {
////                    $result =  $v->errors();
//                    $result='dddd';
//
//                }else{
                    $result = $this->kds->create('divisions', $columns, $request, 'id');
//                }
//                if (!empty($result['errors'][0])) {
//                    dd($result['errors'][0]);
//                    $result['errors'][0] = 'createFailed';
//                }
                break;
            case 'read':
                $result = $this->kds->read('divisions', $columns, $request);
                break;
            case 'update':
                $result = $this->kds->update('divisions', $columns, $request, 'id');
                break;
            case 'destroy':
                $result = $this->kds->destroy('divisions', $request, 'id');
                break;
        }
        //dd($result);

        return response(json_encode($result)) //, JSON_NUMERIC_CHECK
        ->header('Content-Type', 'application/json');
    }
}
