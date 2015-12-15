@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/hd.css">
@stop
@section('body')
    <div class="content">
        <div class="content_w_title">
            <h2><span>往期活动</span></h2>
        </div>
    </div>
    <div class="content">
        <div class="content_w">
            <!-- 左部分文章 -->
            <div class="content_zuo">
                <ul class="am-list am-list-border wz_border">
                    @foreach($pastevents as $pastevent)
                    <li>
                        <div class="content_title"><h3><span>【{{str_replace('-','',substr($pastevent->created_at,0,10))}}期】{{$pastevent->title}}</span></h3></div>
                        <div class="content_ms">
                            <div class="content_ms_left">
                                <img src="{{$pastevent->event_img}}" alt="">
                            </div>
                            <div class="content_ms_right">
                  <span>
                   {{$pastevent->description}}
                  </span>
                            </div>
                            <div class="yd_btn">
                                <button><a href="/pastevents/hddetail/{{$pastevent->pastevents_id}}">阅读全文</a></button>
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
                <?php echo str_replace('pagination', 'am-pagination am-pagination-right', $pastevents->render());?>
            </div>
            <!-- 左部分文章 end -->

            <!-- 广告位 -->
            <div class="content_you">
                <div class="gg_tu">
                    <img src="/template/images/gg_tu_4.png" alt="">
                </div>
                <div class="gg_tu">
                    <img src="/template/images/gg_tu_1.jpg" alt="">
                </div>

                <div class="gg_tu">
                    <img src="/template/images/gg_tu_3.png" alt="">
                </div>
            </div>
            <!-- 广告位 end-->
        </div>
    </div>
@stop