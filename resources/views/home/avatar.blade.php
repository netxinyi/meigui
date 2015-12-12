@extends('home.layout')

@section('content')

        <!-- 修改头像 -->
<form class="am-form" id="mytou-form" method="post" onsubmit="return false;" action="/home/touxiang">
    <div class="am-panel am-panel-default" id="container">
        <header class="am-panel-hd">
            <h3 class="am-panel-title">修改头像</h3>
        </header>
        <div class="am-panel-bd">
            <table class="am-table am-table-striped am-table-hover ">
                <tr>
                    <td>设置新头像</td>
                    <td><span id="progreess"></span></td>
                    <td>
                        <input type="hidden" name="avatar" value="" id="my_avatar">
                        <button type="button" class="am-btn am-btn-danger dy_btn_color" id="pickfiles">选择</button>
                        <button type="submit" class="am-btn am-btn-danger dy_btn_color" id="sure" style="display:none">确认保存</button>
                    </td>
                </tr>
                  <input type="hidden" name="card1" value="" >
                  <input type="hidden" name="card2" value="">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td colspan="3">温馨提示：<br/>
                    1、上传新头像，需要审核后才会显示，请认真检查。<br/>
                    2、头像中请勿出现QQ、MSN、电话号码以及网址、广告、色情或其他不健康的内容。
                </td>
                </tr>
            </table>
        </div>
    </div>
</form>
@stop

 @section('footer-last-js')
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/home/plupload.full.min.js"></script>

<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 相片上传 -->
 <script>
  //     自定义方法，上传处理
    var token = $("input[name='_token']").val();

    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序，如果第一个初始化失败就走第二个，依次类推
        browse_button: 'pickfiles', // you can pass in id...触发浏览文件按钮标签的唯一id,,在flash、html5、和silverlight中能找到触发事件的源
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

                    $("#progreess").after('<img name="image" style="width: 31px; height: 33px;" class="file-btn" src="" >');
                } else {
                    $("#progreess").after('<img name="image" style="width: 128px; height: 128px;" class="file-btn" src="http://dev.meiguihuakai.com.cn/uploads/avatar/' + res + '" >');
                    $("#my_avatar").val(res);

                }

                if (imsize == 0) {
                    $("input[name='card1']").val(res);
                    //$("#tiptext").text('已上传一个附件,还可上传五个附件');
                     $("#pickfiles").hide(); //隐藏了上传按钮
                     $("#sure").show(); //隐藏了上传按钮
                    
                } else if (imsize == 1) {
                    $("input[name='card2']").val(res);
                    // $("#tiptext").text('已上传两个附件,还可上传四个附件');
                     $("#pickfiles").hide(); //隐藏了上传按钮
                     $("#sure").show(); //隐藏了上传按钮


                }else{


                }


                    },
            UploadComplete: function (info) {


            },
            UploadProgress: function (up, file) {
                // document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                //document.getElementById("progreess").innerHTML =   file.percent + "%";
                $('#progreess').text('上传' + file.percent + '%');
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

 </script>
 <!-- 相片上传 -->

<script src="/assets/js/common/common.js"></script>
<script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->

<script>
        $(function () {
             $('#mytou-form').success(function () {
               //$.redirect(null, 2);
                window.location.reload();
             }).form();

        });
 </script>

@stop

