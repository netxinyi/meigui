@extends('home.layout')

@section('content')

        <!-- 我的相册 -->
<div class="am-panel am-panel-default" id="container">
    <header class="am-panel-hd">
        <h3 class="am-panel-title">我的相册</h3> 
    </header>
    <form class="am-form" id="gallery-form" method="post" onsubmit="return false;" action="/home/gallery">
    <button  class="am-btn am-btn-secondary  am-btn-sm" style="float:right" id="tijiaoxia">确认上传</button>
    <div class="am-panel-bd">
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-4 am-gallery-bordered"
            data-am-gallery="{  }">
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt="" id="progreess1" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>
                    <div>
                        <div class="img_update_img_l">
                            <input type="hidden" name="image_url[]" value="" id="url_1">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles1" onclick="ownup0('pickfiles1','progreess1','url_1')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                       <img src="/assets/images/image_def.jpg" alt="" id="progreess2" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                               <input type="hidden" name="image_url[]" value="" id="url_2">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles2" onclick="ownup0('pickfiles2','progreess2','url_2')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt="" id="progreess3" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <input type="hidden" name="image_url[]" value="" id="url_3">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles3" onclick="ownup0('pickfiles3','progreess3','url_3')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt="" id="progreess4" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <input type="hidden" name="image_url[]" value="" id="url_4">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles4" onclick="ownup0('pickfiles4','progreess4','url_4')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt="" id="progreess5" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <input type="hidden" name="image_url[]" value="" id="url_3">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles5" onclick="ownup0('pickfiles5','progreess5','url_5')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt="" id="progreess6" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <input type="hidden" name="image_url[]" value="" id="url_3">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles6" onclick="ownup0('pickfiles6','progreess6','url_6')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt="" id="progreess7" />

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <input type="hidden" name="image_url[]" value="" id="url_7">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"   id="pickfiles7" onclick="ownup0('pickfiles7','progreess7','url_7')">选择</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="/assets/images/image_def.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn home_btn am-btn-sm">审核中</button>
                        </div>
                    </div>
                </div>
            </li>
            
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </ul>
    </div>

</div>

</form>
<!-- 我的相册 end-->
@stop

 @section('footer-last-js')
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/home/plupload.full.min.js"></script>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 相片上传 -->
 <script>
  //     自定义方法，上传处理

     var kk = 1;
    function ownup0(pickbut,images,url){
        if(kk==1){
            ownup(pickbut,images,url);
            kk=2;
        }else{
            return;
        } 
     }

   function ownup0(pickbut,images,url){

    var token = $("input[name='_token']").val();
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序，如果第一个初始化失败就走第二个，依次类推
        browse_button: pickbut, // you can pass in id...触发浏览文件按钮标签的唯一id,,在flash、html5、和silverlight中能找到触发事件的源
        multi_selection: false,  //多选对话框
        container: document.getElementById('container'), // ... or DOM Element itself展现上传文件列表的容器，[默认是body]
        url: "/home/photo"+"?_token="+token, //上传服务器地址
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
               alert(333333);
                // plupload.each(files, function(file) {
                //   document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                // });

                uploader.start();

            },
            FileUploaded: function (up, file, info) {
          
                var res = info.response;
                var type = file.type;
                alert(res);
                alert(type);
                // //判断上传几张图片
                
                var imsize = $('.file-btn').size();
                if (type.indexOf('video') > -1) {

                    $("#progreess").after('<img name="image" style="width: 31px; height: 33px;" class="file-btn" src="" >');
                } else {
                    $("#"+images).after('<img name="image" style="width: 128px; height: 128px;" class="file-btn" src="http://dev.meiguihuakai.com.cn/uploads/avatar/' + res + '" >');
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
<script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->

<script>
        $(function () {
             $('#gallery-form').success(function () {
               //$.redirect(null, 2);
                // window.location.reload();
             }).form();

        });
 </script>

@stop

