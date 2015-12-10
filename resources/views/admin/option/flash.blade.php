@extends('admin.master')

@section('title')
    设置首页轮播图 - 后台管理中心
    @stop

    @section('content')

            <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-stuff-1" >
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">设置首页轮播图</h4>
        </div>
        <div class="panel-body" id="container">
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
            <form class="form-horizontal" id="lunbotu-form" method="post" onsubmit="return false;" action="/admin/option/lunbo">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <label class="col-md-2 control-label">轮播图一{{$errors->first('error')}}</label>
                    <div class="col-md-8">
                        @if($options['lb_image1']=="")
                                 <img src="/assets/images/lunbo_de.jpg" alt="" id="now_image1"   style="height:200px;"/>
                        @else
                                 <img src="/uploads/images/{{$options['lb_image1']}}" alt="" id="now_image1"   style="height:200px;"/>
                        @endif
                       
                        <button id="pickfiles1" onclick="ownup8('pickfiles1','now_image1','url1')" class="btn btn-large btn-info">选择图片</button>
                        <input type="hidden" class="form-control" placeholder="建议上传尺寸宽670像素 * 高335像素的图片" name="lb_image1" value="{{$options['lb_image1']}}" id="url1" />
                        <input type="text" class="form-control" placeholder="广告链接地址：如http://www.yuexiameigui.com" name="lb_url1" value="{{$options['lb_url1']}}" />
                        <input type="text" class="form-control" placeholder="图片提示文字" name="lb_title1" value="{{$options['lb_title1']}}"/>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">轮播图二</label>
                    <div class="col-md-8">
                        @if($options['lb_image2']=="")
                                 <img src="/assets/images/lunbo_de.jpg" alt="" id="now_image2"   style="height:200px;"/>
                        @else
                                 <img src="/uploads/images/{{$options['lb_image2']}}" alt="" id="now_image2"   style="height:200px;"/>
                        @endif
                        <button id="pickfiles2" onclick="ownup8('pickfiles2','now_image2','url2')" class="btn btn-large btn-info">选择图片</button>
                        <input type="hidden" class="form-control" placeholder="建议上传尺寸宽670像素 * 高335像素的图片" name="lb_image2" value="{{$options['lb_image2']}}" id="url2"/>
                        <input type="text" class="form-control" placeholder="广告链接地址：如http://www.yuexiameigui.com" name="lb_url2" value="{{$options['lb_url2']}}" />
                        <input type="text" class="form-control" placeholder="图片提示文字" name="lb_title2" value="{{$options['lb_title2']}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">轮播图三</label>
                    <div class="col-md-8">
                        @if($options['lb_image3']=="")
                                 <img src="/assets/images/lunbo_de.jpg" alt="" id="now_image3"   style="height:200px;"/>
                        @else
                                 <img src="/uploads/images/{{$options['lb_image3']}}" alt="" id="now_image3"   style="height:200px;"/>
                        @endif
                        <button id="pickfiles3" onclick="ownup8('pickfiles3','now_image3','url3')" class="btn btn-large btn-info">选择图片</button>
                        <input type="hidden" class="form-control" placeholder="建议上传尺寸宽670像素 * 高335像素的图片" name="lb_image3" value="{{$options['lb_image3']}}" id="url3"/>
                        <input type="text" class="form-control" placeholder="广告链接地址：如http://www.yuexiameigui.com" name="lb_url3" value="{{$options['lb_url3']}}" />
                        <input type="text" class="form-control" placeholder="图片提示文字" name="lb_title3" value="{{$options['lb_title3']}}"/>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-2"></label>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-success pull-right">&nbsp;保&nbsp;存&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->


@stop

@section('footer-last-js')

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/home/plupload.full.min.js"></script>


<!-- 相片上传 -->
 <script>
  //     自定义方法，上传处理

   function ownup8(pickbut,images,url){

     var token = $("input[name='_token']").val();
   
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序，如果第一个初始化失败就走第二个，依次类推
        browse_button: pickbut, // you can pass in id...触发浏览文件按钮标签的唯一id,,在flash、html5、和silverlight中能找到触发事件的源
        multi_selection: false,  //多选对话框
        container: document.getElementById('container'), // ... or DOM Element itself展现上传文件列表的容器，[默认是body]
        url: "/admin/option/image"+"?_token="+token, //上传服务器地址
        flash_swf_url: '/assets/js/home/Moxie.swf',  //flash文件地址
        silverlight_xap_url: '/assets/js/home/Moxie.xap',
        unique_names: true,
        filters: {
                        max_file_size: '200mb',// Specify what files to browse for
                        mime_types: [
                           {title: "Image files", extensions: "jpg,gif,png,jpeg"},
                           // {title: "Video files", extensions: "avi,wmv,rmvb,mkv,mp4,3gp,mov,MOV"},
                           //  {title : "Zip files", extensions : "zip"}
                        ]
                },
        init: {
            PostInit: function () {
               
                // document.getElementById('filelist').innerHTML = '';

                /*      document.getElementById('uploadfiles').onclick = function() {
                 uploader.start();
                 return false;
                 };*/
            },
            FilesAdded: function (up, files) {
              
                // plupload.each(files, function(file) {
                //   document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                // });

                uploader.start();

            },
            FileUploaded: function (up, file, info) {
          
                var res = info.response;
                var type = file.type;
                // //判断上传几张图片
                
                var imsize = $('.file-btn').size();
                if (type.indexOf('video') > -1) {

                    $("#images").after('<img name="image" style="width: 31px; height: 33px;" class="file-btn" src="" >');
                } else {
                    $("#"+images).hide();
                    $("#"+images).after('<img name="image" style=" height: 200px;" class="file-btn" src="http://dev.meiguihuakai.com.cn/uploads/images/' + res + '" >');
                    $("#"+url).val(res);
                  
                     

                }

                // if (imsize == 0) {
                //     $("input[name='card1']").val(res);
                //     //$("#tiptext").text('已上传一个附件,还可上传五个附件');
                    
                   
                    
                // } else if (imsize == 1) {
                //     $("input[name='card2']").val(res);
                //     // $("#tiptext").text('已上传两个附件,还可上传四个附件');
                //      $("#pickfiles").hide(); //隐藏了上传按钮
                //      $("#sure").show(); //隐藏了上传按钮


                // }else{


                // }


                    },
            UploadComplete: function (info) {


            },
            UploadProgress: function (up, file) {
                // document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                //document.getElementById("progreess").innerHTML =   file.percent + "%";
                // $('#progreess').text('上传' + file.percent + '%');
            },
            Error: function (up, err) {
                document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
            }
        }
    });
       function log() {
                var str = "";
 
                plupload.each(arguments, function (arg) {
                        var row = "";
 
                        if (typeof (arg) != "string") {
                                plupload.each(arg, function (value, key) {
                                        // Convert items in File objects to human readable form
                                        if (arg instanceof plupload.File) {
                                                // Convert status to human readable
                                                switch (value) {
                                                        case plupload.QUEUED:
                                                                value = 'QUEUED';
                                                                break;
 
                                                        case plupload.UPLOADING:
                                                                value = 'UPLOADING';
                                                                break;
 
                                                        case plupload.FAILED:
                                                                value = 'FAILED';
                                                                break;
 
                                                        case plupload.DONE:
                                                                value = 'DONE';
                                                                break;
                                                }
                                        }
 
                                        if (typeof (value) != "function") {
                                                row += (row ? ', ' : '') + key + '=' + value;
                                        }
                                });
 
                                str += row + " ";
                        } else {
                                str += arg + " ";
                        }
                });
 
                var log = document.getElementById('console');
                log.innerHTML += str + "\n";
        }
    uploader.init();
   

    }
 </script>
 <!-- 相片上传 -->

<script src="/assets/js/common/common.js"></script>
<!--<![endif]-->
<script>
        $(function () {
             $('#lunbotu-form').success(function () {
               //$.redirect(null, 2);
                 window.location.reload();

             }).form();

        });

 </script>
@stop

@section('last-css')

@stop