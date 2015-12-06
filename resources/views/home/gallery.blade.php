@extends('home.layout')

@section('content')

        <!-- 我的相册 -->
<div class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <h3 class="am-panel-title">我的相册</h3>
    </header>
    <div class="am-panel-bd">
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
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"
                                    data-fileinput="true">上传
                            </button>
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
                            <button type="button" class="am-btn am-btn-secondary  home_btn am-btn-sm"
                                    data-fileinput="true">上传
                            </button>
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
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"
                                    data-fileinput="true">上传
                            </button>
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
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"
                                    data-fileinput="true">上传
                            </button>
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
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"
                                    data-fileinput="true">上传
                            </button>
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
                            <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm"
                                    data-fileinput="true">上传
                            </button>
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
                            <input type="file" class="am-btn am-btn-secondary home_btn am-btn-sm" data-fileinput="true">上传</input>
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
@section('last-css')
    @parent
    <link rel="stylesheet" href="/assets/lib/boostrap-fileinput/bootstrap-fileinput.css">
@stop
@section('footer-last-js')
    <script type="text/javascript" src="/assets/lib/boostrap-fileinput/bootstrap-fileinput.js"></script>
    <script type="text/javascript" src="/assets/lib/boostrap-fileinput/bootstrap-fileinput-local-zh.js"></script>
    <script type="text/javascript">
        $('[data-fileinput]').fileinput({
            language: 'zh', //设置语言
            uploadUrl: '/home/photo', //上传的地址
            allowedFileExtensions: ['jpg', 'png', 'gif'],//接收的文件后缀
            showUpload: false, //是否显示上传按钮
            showCaption: false,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        });
    </script>
@stop