@extends('layouts.master')

@section('head_extra')
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            {!! Form::open( ['url' => url('admin/routes?search=1'), 'id' => 'frmRouteList'] ) !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">

                        <div class="col-sm-6">
                            <h3 class="box-title">{{ trans('admin/routes/general.page.index.table-title') }}</h3>

                            @permission('core.routes.create')
                            <a class="btn btn-default btn-sm" href="{!! route('admin.routes.create') !!}" title="{{ trans('admin/routes/general.button.create') }}">
                                <i class="fa fa-plus-square"></i>
                            </a>
                            @else
                                <a class="btn btn-default btn-sm" disabled="true"  href="#" title="{{ trans('admin/routes/general.error.no-permission-to-create-routes') }}">
                                    <i class="fa fa-plus-square"></i>
                                </a>
                                @endpermission

                                @permission('core.routes.enable')
                                <a class="btn btn-default btn-sm" href="#" onclick="document.forms['frmRouteList'].action = '{!! route('admin.routes.enable-selected') !!}';  document.forms['frmRouteList'].submit(); return false;" title="{{ trans('general.button.enable') }}">
                                    <i class="fa fa-check-circle-o"></i>
                                </a>
                                @else
                                    <a class="btn btn-default btn-sm" disabled="true"  href="#" title="{{ trans('admin/routes/general.error.no-permission-to-enable-routes') }}">
                                        <i class="fa fa-check-circle-o"></i>
                                    </a>
                                    &nbsp;                   @endpermission

                                    @permission('core.routes.disable')
                                    <a class="btn btn-default btn-sm" href="#" onclick="document.forms['frmRouteList'].action = '{!! route('admin.routes.disable-selected') !!}';  document.forms['frmRouteList'].submit(); return false;" title="{{ trans('general.button.disable') }}">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                    @else
                                        <a class="btn btn-default btn-sm" disabled="true"  href="#" title="{{ trans('admin/routes/general.error.no-permission-to-disable-routes') }}">
                                            <i class="fa fa-ban"></i>
                                        </a>
                                        &nbsp;                   @endpermission
                        </div> <!-- col-sm-6 -->

                        <div class="col-sm-6">
                            {!! $filter->open !!}
                            <div class="input-group custom-search-form">
                                {!! $filter->field('srch') !!}
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                        <a href="{!! route('admin.routes.index') !!}" class="btn btn-default">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </span>
                            </div>
                            {!! $filter->close !!}
                        </div> <!-- col-sm-6 -->

                    </div> <!-- row -->
                </div>
                <div class="box-body">
                    {!! $grid !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection

@section('body_bottom')
    @include('partials.body_bottom_tab_with_state_reset_js')

    <script language="JavaScript">
        function toggleCheckbox() {
            checkboxes = document.getElementsByName('chkRoute[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
    </script>
@endsection
