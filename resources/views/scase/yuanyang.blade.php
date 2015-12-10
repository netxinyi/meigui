@extends('layouts.master')
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
                    <h3 class="am-panel-title">鸳鸯谱标题</h3>
                  </header>
                  <div class="am-panel-bd">
                      <div
                          class="am-slider am-slider-default"
                          data-am-flexslider="{controlNav: 'thumbnails', directionNav: false, slideshow: false}">
                          <ul class="am-slides">
                            <li data-thumb="/template/images/pure-1.jpg"><img src="/template/images/pure-1.jpg" /></li>
                                  <li data-thumb="/template/images/pure-2.jpg"><img src="/template/images/pure-2.jpg" /></li>
                                  <li data-thumb="/template/images/pure-3.jpg"><img src="/template/images/pure-3.jpg" /></li>
                                  <li data-thumb="/template/images/pure-4.jpg"><img src="/template/images/pure-4.jpg" /></li>
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
                           一切来得静悄悄，好象是彼此早有的约定，我们没有海枯石烂的誓言，但约定今生相守到老！2014年1月24日我们结婚了，告别苍白的昨天我们乘坐快乐列车向幸福出发。一切来得静悄悄，好象是彼此早有的约定，我们没有海枯石烂的誓言，但约定今生相守到老！2014年1月24日我们结婚了，告别苍白的昨天我们乘坐快乐列车向幸福出发。一切来得静悄悄，好象是彼此早有的约定，我们没有海枯石烂的誓言，但约定今生相守到老！2014年1月24日我们结婚了，告别苍白的昨天我们乘坐快乐列车向幸福出发。一切来得静悄悄，好象是彼此早有的约定，我们没有海枯石烂的誓言，但约定今生相守到老！2014年1月24日我们结婚了，告别苍白的昨天我们乘坐快乐列车向幸福出发。
                         </span>
                       </div>
                  </div>
               </div>
            </div>
            <!-- 鸳鸯谱描述 end-->
        </div>
        <div class="content_w_top_you">
          　<div class="jiaoyoutishi">
              <img src="/template/images/yypu.jpg" alt="" width="256px;">
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

