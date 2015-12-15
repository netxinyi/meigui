@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/article.css">
@stop
@section('body')
    <div class="content">
        <div class="content_w_title"></div>
    </div>
    <div class="content">
        <div class="content_w">
            <!-- 左部分文章分类 -->
            <div class="content_zuo">
                <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>

                    <dl class="am-accordion-item am-active">
                        <dt class="am-accordion-title">

                        </dt>

                        <dd class="am-accordion-bd am-collapse am-in">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">

                                    <li class="am-g am-list-item-dated">
                                        <a href="" class="am-list-item-hd "></a>
                                        <span class="am-list-date"></span>
                                    </li>

                                </ul>
                            </div>
                        </dd>
                    </dl>

                </section>
                <div id="erweima">
                    <div><span>扫描二维码关注玫瑰花开网微信服务号</span></div>
                    <div><img src="/assets/images/wx_ma.jpg" alt=""></div>
                    <div><span>微信号：玫瑰花开网</span></div>


                </div>

            </div>
            <!-- 左部分文章分类 end -->

            <!-- 正文内容 -->
            <div class="content_you">
                <div>
                    <article class="am-article">
                        <div class="am-article-hd">
                            <h1 class="am-article-title"></h1>

                            <p class="am-article-meta">发布时间： </p>
                        </div>
                        <div class="am-article-bd">
                            <p class="am-article-lead">

                            </p>
                        </div>
                    </article>
                </div>
            </div>
            <!-- 正文内容 end-->
        </div>
    </div>
@stop