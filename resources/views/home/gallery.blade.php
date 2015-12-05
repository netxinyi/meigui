@extends('home.layout')

@section('last-css')
<link href="/assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="/assets/js/common/fileinput.min.js" type="text/javascript"></script>
<script src="/assets/js/common/fileinput_locale_zh.js" type="text/javascript"></script>
@stop

@section('content')

        <!-- 我的相册 -->
<div class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <h3 class="am-panel-title">我的相册</h3>
    </header>
    <div class="am-panel-bd">
          <div class="form-group">
                    <label>文件上传</label>
                    <input id="image-8" type="file" class="file">
          </div>

        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-4 am-gallery-bordered"
            data-am-gallery="{  }">
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>
                    
                   

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary  home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

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
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="#" class="">
                        <img src="./images/home_girl.jpg" alt=""/>

                        <div class="am-gallery-desc">
                        </div>
                    </a>

                    <div>
                        <div class="img_update_img_l">
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm">上传</button>
                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm">删除</button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- 我的相册 end-->
@stop

@section('footer-last-js')
    <script src="http://libs.useso.com/js/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

    <script>

        //初始化fileinput控件（第一次初始化）
        $('#image-8').fileinput({
            language: 'zh', //设置语言
            uploadUrl: "/home/photos", //上传的地址
            allowedFileExtensions : ['jpg', 'png','gif'],//接收的文件后缀,
            maxFileCount: 100,
            enctype: 'multipart/form-data',
            showUpload: true, //是否显示上传按钮
            showCaption: false,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式             
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>", 
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        });

        
      // formValidate("ffAdd", function (form) {
      //           $("#add").modal("hide");
      //           //构造参数发送给后台
      //           var postData = $("#ffAdd").serializeArray();
      //           $.post(url, postData, function (json) {
      //               var data = $.parseJSON(json);
      //               if (data.Success) {
      //                   //增加图片的上传处理
      //                   initPortrait(data.Data1);//使用写入的ID进行更新
      //                   $('#file-Portrait').fileinput('upload');

      //                   //保存成功  1.关闭弹出层，2.刷新表格数据
      //                   showTips("保存成功");
      //                   Refresh();
      //               }
      //               else {
      //                   showError("保存失败:" + data.ErrorMessage, 3000);
      //               }
      //           }).error(function () {
      //               showTips("您未被授权使用该功能，请联系管理员进行处理。");
      //           });
      //       });
      
    </script>
@stop