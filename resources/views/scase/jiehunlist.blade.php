@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/detail.css"/>
@stop
@section('body')
    <div class="wap_content_member">
        <div class="content_member" style="text-align:center;height:40px;line-height:40px;">我要结婚啦</div>
    </div>
    <div  class="content_member">
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-6 am-gallery-bordered" data-am-gallery="{  }">
            @foreach($case as $case)
                <li>
                    <div class="am-gallery-item">
                        <a href="/scase/jjdetail/{{$case->case_id}}" class="">
                            <img src="{{$case->cover}}" alt="{{$case->title}}" />

                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@stop