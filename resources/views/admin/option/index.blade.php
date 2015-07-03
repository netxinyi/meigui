@extends('admin.master')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">网站设置</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">基本设置
        <small></small>
    </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-repeat"></i></a>
            </div>
            <h4 class="panel-title">Form Editable</h4>
        </div>
        <div class="panel-body">
            <p>
                <span class="m-r-5">Mode:</span>
                <a href="form_editable.html" class="btn btn-primary btn-xs active" data-editable="popup">Popup</a>
                <a href="form_editable.html?c=inline" class="btn btn-primary btn-xs" data-editable="inline">Inline</a>
            </p>

            <div class="table-responsive">
                <table id="user" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Field Name</th>
                        <th>Field Value</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Username</td>
                        <td><a href="#" id="username" data-type="text" data-pk="1"
                               data-title="Enter Username">superuser </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td>Firstname</td>
                        <td><a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right"
                               data-placeholder="Required" data-title="Enter your Firstname"></a></td>
                        <td><span class="text-muted">Required text field, originally empty </span></td>
                    </tr>
                    <tr>
                        <td>Sex</td>
                        <td><a href="#" id="sex" data-type="select" data-pk="1" data-value=""
                               data-title="Select sex"></a></td>
                        <td><span class="text-muted">Select, loaded from js array. Custom display</span></td>
                    </tr>
                    <tr>
                        <td>Group</td>
                        <td><a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups"
                               data-title="Select group">Admin</a></td>
                        <td><span class="text-muted">Select, loaded from server. <strong>No
                                    buttons</strong> mode </span></td>
                    </tr>
                    <tr>
                        <td>Error While Loading</td>
                        <td><a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status"
                               data-title="Select status">Active </a></td>
                        <td><span class="text-muted">Error when loading list items</span></td>
                    </tr>
                    <tr>
                        <td>Plan vacation?</td>
                        <td><a href="#" id="vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1"
                               data-placement="right" data-title="When you want vacation to start?">25.02.2013</a></td>
                        <td><span class="text-muted">Datepicker </span></td>
                    </tr>
                    <tr>
                        <td>Date of birth</td>
                        <td><a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD"
                               data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"
                               data-title="Select Date of birth"></a></td>
                        <td><span class="text-muted">Date field (combodate) </span></td>
                    </tr>
                    <tr>
                        <td>Setup event</td>
                        <td><a href="#" id="event" data-type="combodate" data-template="D MMM YYYY HH:mm"
                               data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1"
                               data-title="Setup event date and time"></a></td>
                        <td><span class="text-muted">Datetime field (combodate)</span></td>
                    </tr>
                    <tr>
                        <td>Meeting start</td>
                        <td><a href="#" id="meeting_start" data-type="datetime" data-pk="1" data-url="/post"
                               data-placement="right" data-title="Set date & time">15/03/2013 12:45</a></td>
                        <td><span class="text-muted">Bootstrap datetime</span></td>
                    </tr>
                    <tr>
                        <td>Comments</td>
                        <td>
                            <a href="#" id="comments" data-type="textarea" data-pk="1"
                               data-placeholder="Your comments here..."
                               data-original-title="Enter comments">awesome<br/>user!</a></td>
                        <td>
                                        <span class="text-muted">
                                        Textarea. Buttons below. Submit by <i>ctrl+enter</i>
                                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type State</td>
                        <td><a href="#" id="state" data-type="typeaheadjs" data-pk="1" data-placement="right"
                               data-title="Start typing State.."></a></td>
                        <td><span class="text-muted">Twitter typeahead.js</span></td>
                    </tr>
                    <tr>
                        <td>Fresh fruits</td>
                        <td><a href="#" id="fruits" data-type="checklist" data-value="1,2"
                               data-title="Select fruits"></a></td>
                        <td><span class="text-muted">Checklist</span></td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td><a href="#" id="tags" data-type="select2" data-pk="1" data-title="Enter tags">html,
                                javascript </a></td>
                        <td><span class="text-muted">Select2 (tags mode) </span></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><a href="#" id="country" data-type="select2" data-pk="1" data-value="BS"
                               data-title="Select country"></a></td>
                        <td><span class="text-muted">Select2 (dropdown mode)</span></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><a href="#" id="address" data-type="address" data-pk="1"
                               data-title="Please, fill address"></a></td>
                        <td><span class="text-muted">Your custom input, several fields</span></td>
                    </tr>
                    <tr>
                        <td>Notes</td>
                        <td>
                            <div id="note" data-pk="1" data-type="wysihtml5" data-toggle="manual"
                                 data-title="Enter notes">
                                <h3>WYSIWYG</h3>
                                WYSIWYG means <i>What You See Is What You Get</i>.<br/>
                                But may also refer to:
                                <ul>
                                    <li>
                                        WYSIWYG (album), a 2000 album by Chumbawamba
                                    </li>
                                    <li>
                                        "Whatcha See is Whatcha Get", a 1971 song by The Dramatics
                                    </li>
                                    <li>
                                        WYSIWYG Film Festival, an annual Christian film festival
                                    </li>
                                </ul>
                                <p><i>Source:</i><a href="http://en.wikipedia.org/wiki/WYSIWYG_%28disambiguation%29">wikipedia.org</a>
                                </p>
                            </div>
                        </td>
                        <td>
                            <a href="#" id="pencil"><i class="fa fa-pencil"></i> [edit]</a>
                            <br/>
                            <span class="text-muted">Wysihtml5 (bootstrap only).<br/>Toggle by another element</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h3><i class="fa fa-terminal"></i> Console
                <small>(all ajax requests here are emulated)</small>
            </h3>
            <div>
                <textarea id="console" rows="8" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <!-- end panel -->



@stop

@section('footer-last-js')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/lib/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="/assets/lib/bootstrap3-editable/inputs-ext/address/address.js"></script>
    <script src="/assets/lib/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
    <script src="/assets/lib/bootstrap3-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
    <script src="/assets/lib/bootstrap3-editable/inputs-ext/wysihtml5/wysihtml5.js"></script>
    <script src="/assets/lib/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="/assets/lib/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="/assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/assets/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/lib/select2/js/select2.min.js"></script>
    <script src="/assets/lib/mockjax/jquery.mockjax.js"></script>
    <script src="/assets/lib/moment/moment.min.js"></script>
    <script src="/assets/admin/js/form-editable.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script type="text/javascript">
        $(document).ready(function () {
            FormEditable.init();
        });
    </script>
@stop

@section('last-css')
    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="/assets/lib/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap3-editable/inputs-ext/address/address.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet"/>
    <link href="/assets/lib/select2/css/select2.min.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet"/>
    <!-- ================== END PAGE CSS STYLE ================== -->
@stop