@extends('home.layout')

@section('content')
    <style>
        #picker [type="file"] {
            text-indent: 99999px;
            width: 100px;
            padding-left: 100px;
            height: 100%;
        }

        .file {
            position: absolute;
            text-indent: 99999px;
            display: block;
            left: 0;
            top: 0;
            height: 30px;
            width: 100%;
            z-index: 1;
            padding-left: 100px;
        }
    </style>
    <!-- 我的相册 -->
    <div class="am-panel am-panel-default" id="container">
        <header class="am-panel-hd">
            <h3 class="am-panel-title">我的相册</h3>
        </header>
        <form class="am-form" id="gallery-form" method="post" onsubmit="return false;" action="/home/gallery">
            <button class="am-btn am-btn-secondary  am-btn-sm" style="float:right;display:none" id="tijiaoxia">保存信息
            </button>
            <div class="am-panel-bd">
                <ul data-am-widget="gallery"
                    class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-4 am-gallery-bordered"
                    data-am-gallery="{  }">
                    @foreach(user()->gallery as $photo)
                        <li>
                            <div class="am-gallery-item">
                                <a href="{{$photo->image_url}}" class="">

                                    <img src="{{$photo->image_url}}" alt="" width="207" height="200"/>

                                </a>

                                <div>
                                    <div class="img_update_img_l">
                                        @if($photo->status == \App\Enum\User::GALLERY_CHECK)
                                            <button class="am-btn home_btn am-btn-sm " type="button">相片审核中</button>
                                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm"
                                                    data-id="{{$photo->photo_id}}" data-click="delete">删除
                                            </button>
                                        @elseif($photo->status == \App\Enum\User::GALLERY_NOCHECK)
                                            <button class="am-btn home_btn am-btn-sm " type="button">审核未通过</button>
                                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm"
                                                    data-id="{{$photo->photo_id}}" data-click="delete">删除
                                            </button>
                                        @else
                                            <button type="button" class="am-btn am-btn-danger home_btn am-btn-sm"
                                                    data-id="{{$photo->photo_id}}" data-click="delete" style="width: 100%"> 删除
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    <li>
                        <div class="am-gallery-item">
                            <a href="javascript:;" class="">

                                <img src="/assets/images/image_def.jpg" alt=""/>

                            </a>

                            <div>
                                <div class="img_update_img_l">

                                    <button type="button" class="am-btn am-btn-secondary home_btn am-btn-sm" id="picker"
                                            style="width: 100%">选择

                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <input type="hidden" name="user_id" value="{{user()->user_id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </ul>
            </div>


        </form>
    </div>
    <!-- 我的相册 end-->
@stop

@section('footer-last-js')

    <script src="http://fex.baidu.com/webuploader/js/webuploader.js"></script>
    <script type="text/javascript">
        var uploader = WebUploader.create({

            // 文件接收服务端。
            server: '/home/photo?_token={{csrf_token()}}',

            // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
            resize: false,
            pick: "#picker"
        });

        $(function () {

            $('[data-click="delete"]').click(function () {

                if (confirm("确定要删除吗?")) {
                    var id = $(this).data("id")
                    $.ajax({
                        url: "/home/photo/" + id,
                        data: {_token: "{{csrf_token()}}"},
                        method: "delete",
                        success: function (ret) {
                            if (ret.code == 1000) {
                                $.alert("删除成功!", "success");
                                $.redirect(null, 1500);
                            } else {
                                $.alert(ret.msg, "danger");

                            }
                        },
                        error: function () {
                            $.alert("抱歉,删除失败,请稍后再试", "danger")
                        }
                    });
                }
            });
            uploader.on('fileQueued', function (file) {
                $('#picker').attr('disabled', 'disabled');
                $('.webuploader-pick').text("正在上传...");
                uploader.upload();
            });
            uploader.on("uploadSuccess", function (field, ret) {
                $('#picker').removeAttr('disabled');
                $('.webuploader-pick').text("选择");
                if (ret.code === 1000) {
                    $.alert("上传成功", "success");
                    $.redirect(null, 1500);
                } else {
                    $.alert("抱歉,上传失败", 'danger');
                    uploader.reset();
                }
            });

            uploader.on("uploadError", function () {
                $('#picker').removeAttr('disabled');
                $('.webuploader-pick').text("选择");
                $.alert("抱歉,上传失败", 'danger');
                uploader.reset();
            });
        });

    </script>
@stop

