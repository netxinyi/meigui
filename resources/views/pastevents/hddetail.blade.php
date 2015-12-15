@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
@stop
@section('body')
    <div class="content">
        <div class="content_w_title">
        </div>
    </div>
    <div class="content">
        <div class="content_w">
            <!-- 左部分文章 -->
            <div class="content_zuo_d">
                <!-- 文章标题 -->
                <div class="wen_title">
                    <h3><span>【{{str_replace('-','',substr($pastevents->created_at,0,10))}}期】{{$pastevents->title}}</span></h3>
                </div>

                <!-- 文章简介      -->
                <div class="wen_jianjie">
          <span>
              <?php echo $pastevents->content;?>
          </span>
                </div>
            </div>
            <!-- 左部分文章 end -->
        </div>
    </div>
@stop