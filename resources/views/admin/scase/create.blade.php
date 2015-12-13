@extends('admin.master')

@section('title')
    添加案例 - 后台管理中心
    @stop

    @section('content')
            <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">添加案例</h4>
        </div>
        <div class="panel-body">
            @if($errors->has('error'))
                <div class="alert alert-danger fade in m-b-15">
                    {{$errors->first('error')}}
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            @endif
            @if($errors->has('success'))
                <div class="alert alert-success fade in m-b-15">
                    {{$errors->first('success')}}
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            @endif
            <form id="fileupload" class="form-horizontal" action="{{route('admin.scase.store')}}" method="post"
                  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">


                <div class="form-group">
                    <label class="col-md-2 control-label">案例标题</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="请输入标题" name="title"
                               value="{{old('title')}}"/>
                        @if($errors->has('title'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('title')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">男主角</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="男主角id" name="male_id"
                               value="{{old('male_id')}}"/>
                        @if($errors->has('male_id'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('male_id')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">女主角</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="女主角id" name="female_id"
                               value="{{old('female_id')}}"/>
                        @if($errors->has('female_id'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('female_id')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">发布类型</label>

                    <div class="col-md-8">
                        <select name="publish_type" class="form-control">
                            @foreach(\App\Enum\Scase::$publishLang as $value=>$lable)
                                <option value="{{$value}}" @if(old('publish_type') == $value)
                                        selected @endif>{{$lable}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">照片</label>

                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>添加</span>
                    <input type="file" name="image" multiple>
                </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>开始上传</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>取消上传</span>
                            </button>
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                            <span style="color:red">建议图片尺寸<span style="color:blue">2048*1280</span>,默认第一张为封面</span>
                            @if($errors->has('photos'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('photos')}}</li>
                                </ul>
                            @endif
                        </div>
                        <!-- The global progress state -->
                        <div class="col-lg-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                 aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped">
                        <tbody class="files"></tbody>
                    </table>
                </div>


                <div class="form-group">
                    <label for="title" style="margin-left: 5%">爱情故事</label>
                    <textarea name="content" id="html-editor" style="height: 300px"></textarea>
                    @if($errors->has('content'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{$errors->first('content')}}</li>
                        </ul>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-md-2"></label>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-success pull-right">&nbsp;提&nbsp;交&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->

    {{--文件上传相关start--}}
    <!-- The blueimp Gallery widget -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>上传</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>取消</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}



    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}



    </script>
    {{--文件上传相关end--}}
    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/lib/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/vendor/tmpl.min.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/vendor/load-image.min.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
    <script src="/assets/lib/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload-process.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload-image.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload-video.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
    <script src="/assets/lib/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="/assets/lib/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
    <script src="/assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script type="text/javascript" charset="utf-8" src="/assets/lib/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/assets/lib/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/assets/lib/umeditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        //实例化编辑器
        var um = UM.getEditor('html-editor');

        $("#fileupload").fileupload({
            url: '/admin/scase/image',
            autoUpload: false,
            disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
            maxFileSize: 5e6,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            done: function (e, o) {
                var url = o.response().result.image.url;
                $('#fileupload').append('<input type="hidden" name="photos[]" value="' + url + '">');
                return true;
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },
            success:function () {
               $('.progress').remove();
            }
        });

    </script>
    @stop

    @section('last-css')
            <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="/assets/admin/css/blueimp-gallery.min.css" rel="stylesheet"/>
    <link href="/assets/admin/css/jquery.fileupload.css" rel="stylesheet"/>
    <link href="/assets/admin/css/jquery.fileupload-ui.css" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <link href="/assets/lib/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <style>
        .edui-container, .edui-body-container {
            width: 90% !important;
            margin-left: 5%;
        }
    </style>
@stop