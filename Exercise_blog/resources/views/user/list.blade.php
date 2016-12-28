@extends('layouts.master')
@section('page_title', 'User Information')
@section('menu_security', 'active')
@section('menu_user', 'active')
@section('page_header')
    <i class="icon-key position-left"></i> <span class="text-semibold">User</span>
@endsection

@section('breadcrumb_links')

        <li><a href="{{url('user/create')}}"><i class="icon-user-plus position-left"></i> Add User</a></li>
        @endsection


        @section('content')

                <!--list -->

        <div id="grid_center"></div>
        <script type="application/javascript">

            $(document).ready(function () {

                {{!!$grid_data!!}}

                function commandEdit(e) {
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;
                    var grid = $("#grid_center").data("kendoGrid");
                    var dataItem = grid.dataItem($(e.currentTarget).closest("tr"));
                    window.location.href = '/user/' + dataItem.id + '/edit/';
                }

                function commandPermission(e) {
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;
                    var grid = $("#grid_center").data("kendoGrid");
                    var dataItem = grid.dataItem($(e.currentTarget).closest("tr"));
                    window.location.href = '/userpermission/' + dataItem.id + '/edit/';
                }

                function commandDelete(e) {
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;
                    var grid = $("#grid_center").data("kendoGrid");
                    if (confirm("{!!config('app_config.msg_delete_confirmation')!!}")) {
                        var dataItem = grid.dataItem($(e.currentTarget).closest("tr"));
                        $.ajax({
                            type: "POST",
                            url: "/user/destroy",
                            contentType: "application/json",
                            data: JSON.stringify({id: dataItem.id}),
                        }).done(function (data) {
                            //console.log(data);
                            if (data == 0) {
                                toastr["success"]("{!!config('app_config.msg_delete')!!}", "Delete");
                            } else {
                                toastr["error"]("{!!config('app_config.msg_used')!!}", "{!!config('app_config.msg_delete_relation')!!}");
                            }
                            grid.dataSource.read();
                            grid.refresh();
                        });

                    }
                }

            });
        </script>

        <!-- /list -->

@endsection