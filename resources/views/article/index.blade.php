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
                    @foreach($lanmus as $lanmu)
                    <dl class="am-accordion-item am-active">
                        <dt class="am-accordion-title">
                            {{$lanmu->column_name}}
                        </dt>

                        <dd class="am-accordion-bd am-collapse am-in">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    @foreach($lanmu->articles as $article)
                                    <li class="am-g am-list-item-dated">
                                        <a href="{{$article->article_id}}" class="am-list-item-hd ">{{$article->title}}</a>
                                        <span class="am-list-date">{{$article->created_at}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    @endforeach
                </section>
                <div id="erweima">
                    <div><span>扫描二维码关注玫瑰花开网微信服务号</span></div>
                    <div><img src="./images/wx_ma.jpg" alt=""></div>
                    <div><span>微信号：玫瑰花开网</span></div>


                </div>

            </div>
            <!-- 左部分文章分类 end -->

            <!-- 正文内容 -->
            <div class="content_you">
                <div>
                    <article class="am-article">
                        <div class="am-article-hd">
                            <h1 class="am-article-title">{{$art->title}}</h1>

                            <p class="am-article-meta">发布时间：{{$art->created_at}} </p>
                        </div>
                        <div class="am-article-bd">
                            <p class="am-article-lead">
                                <?php echo $art->content;?>
                            </p>
                        </div>
                    </article>
                </div>
            </div>
            <!-- 正文内容 end-->
        </div>
    </div>
@stop