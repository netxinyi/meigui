@extends('layouts.master')
@section('title')
    鸳鸯谱--{{$case->title}}
@stop
@section('last-css')
   
    <link rel="stylesheet" href="/assets/css/gushi.css"/>
    <style>
        .am-control-thumbs li {
          width: 100%/2; /* n 为轮播图数量 */
        }
    </style>
   
@stop
<script src="/assets/lib/jquery/jquery-1.9.1.min.js"></script>
@section('body')


<div class="content">
    <div class="content_w">
      <div class="content_w_top">

        <div  class="content_w_top_img">
             <!-- 鸳鸯谱图片 -->
            <div class="lou">
               <div class="am-panel am-panel-secondary">
                  <header class="am-panel-hd">
                    <h3 class="am-panel-title">{{$case->title}}</h3>
                  </header>
                  <div class="am-panel-bd">
                      <div
                          class="am-slider am-slider-default"
                          data-am-flexslider="{controlNav: 'thumbnails', directionNav: false, slideshow: false}">
                          <ul class="am-slides">
                              @foreach($case->photos as $photo)
                            <li data-thumb="{{$photo}}"><img src="{{$photo}}" /></li>
                              @endforeach
                          </ul>
                        </div>
                  </div>
               </div>
            </div>
            <!-- 鸳鸯谱图片 end-->
            <!-- 鸳鸯谱描述 -->
            <div class="lou">
               <div class="am-panel am-panel-secondary">
                  <header class="am-panel-hd">
                    <h3 class="am-panel-title">我们的故事</h3>
                  </header>
                  <div class="am-panel-bd">
                       <div>
                         <span>
                          <?php echo $case->content;?>
                           </span>
                       </div>
                  </div>
               </div>
            </div>
            <!-- 鸳鸯谱描述 end-->
        </div>
        <div class="content_w_top_you">
          　<div class="jiaoyoutishi">
              <img src="{{$case->cover}}" alt="" width="256px;">
          </div>
          <div class="jiaoyoutishi">
              <span>
                鸳鸯谱介绍：<br />
                1、鸳鸯谱介绍。。。。。<br />
                2、鸳鸯谱介绍。。。。。<br />
              </span>
          </div>
        </div>
          
      </div>
    
    </div>
</div>

@stop

@section('footer-last-js')



<script src="/assets/lib/amazeui/amazeui.min.js"></script>
@stop

