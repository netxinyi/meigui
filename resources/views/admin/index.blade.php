@extends('admin.master')

@section('content')

    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>今日访问量</h4>

                    <p>3,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">总访问量: 8976</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>今日注册用户</h4>

                    <p>231</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">总用户数:345</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-comment"></i></div>
                <div class="stats-info">
                    <h4>今日文章评论数</h4>

                    <p>1,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">评论总数:3123</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <h4>今日留言数</h4>

                    <p>00:12:23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">总留言数:321</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">网站访问量（最近7天）</h4>
                </div>
                <div class="panel-body">
                    <div id="interactive-chart" class="height-sm"></div>
                </div>
            </div>
            <div class="panel panel-inverse">

                <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile">
                    <li class="active">
                        <a href="#latest-message" data-toggle="tab">
                            <i class="fa fa-edit m-r-5"></i>
                            <span class="hidden-xs">最新留言</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#latest-comment" data-toggle="tab">
                            <i class="fa fa-weixin m-r-5"></i>
                            <span class="hidden-xs">最新评论</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="latest-message">
                        <div class="height-sm" data-scrollbar="true">
                            <ul class="media-list media-list-with-divider media-messaging">
                                <li class="media media-sm">
                                    <a href="javascript:;" class="pull-left">
                                        <img src="/assets/admin/img/user-5.jpg" alt=""
                                             class="media-object rounded-corner"/>
                                    </a>

                                    <div class="media-body">
                                        <h5 class="media-heading">John Doe</h5>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id nunc non
                                            eros fermentum vestibulum ut id felis. Nunc molestie libero eget urna
                                            aliquet, vitae laoreet felis ultricies. Fusce sit amet massa malesuada,
                                            tincidunt augue vitae, gravida felis.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="latest-comment">
                        <div class="height-sm" data-scrollbar="true">
                            <ul class="media-list media-list-with-divider">
                                <li class="media media-sm">
                                    <a href="javascript:;" class="pull-left">
                                        <img src="/assets/admin/img/user-1.jpg" alt=""
                                             class="media-object rounded-corner"/>
                                    </a>

                                    <div class="media-body">
                                        <a href="javascript:;"><h4 class="media-heading">Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.</h4></a>

                                        <p class="m-b-5">
                                            Aenean mollis arcu sed turpis accumsan dignissim. Etiam vel tortor at risus
                                            tristique convallis. Donec adipiscing euismod arcu id euismod. Suspendisse
                                            potenti. Aliquam lacinia sapien ac urna placerat, eu interdum mauris
                                            viverra.
                                        </p>
                                        <i class="text-muted">Received on 04/16/2013, 12.39pm</i>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end col-8 -->
        <!-- begin col-4 -->
        <div class="col-md-4">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">管理员留言</h4>
                </div>
                <div class="panel-body bg-silver">
                    <div data-scrollbar="true" data-height="225px">
                        <ul class="chats">
                            <li class="left">
                                <span class="date-time">yesterday 11:23pm</span>
                                <a href="javascript:;" class="name">Sowse Bawdy</a>
                                <a href="javascript:;" class="image"><img alt=""
                                                                          src="/assets/admin/img/user-12.jpg"/></a>

                                <div class="message">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis
                                    interdum arcu eu feugiat.
                                </div>
                            </li>
                            <li class="right">
                                <span class="date-time">08:12am</span>
                                <a href="#" class="name"><span class="label label-primary">ADMIN</span> Me</a>
                                <a href="javascript:;" class="image"><img alt=""
                                                                          src="/assets/admin/img/user-13.jpg"/></a>

                                <div class="message">
                                    Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
                                </div>
                            </li>
                            <li class="left">
                                <span class="date-time">09:20am</span>
                                <a href="#" class="name">Neck Jolly</a>
                                <a href="javascript:;" class="image"><img alt=""
                                                                          src="/assets/admin/img/user-10.jpg"/></a>

                                <div class="message">
                                    Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                </div>
                            </li>
                            <li class="left">
                                <span class="date-time">11:15am</span>
                                <a href="#" class="name">Shag Strap</a>
                                <a href="javascript:;" class="image"><img alt=""
                                                                          src="/assets/admin/img/user-14.jpg"/></a>

                                <div class="message">
                                    Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-footer">
                    <form name="send_message_form" data-id="message-form">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="message"
                                   placeholder="Enter your message here.">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-sm" type="button">Send</button>
                                    </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">New Registered Users</h4>
                </div>
                <ul class="registered-users-list clearfix">
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-5.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Savory Posh
                            <small>Algerian</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-3.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Ancient Caviar
                            <small>Korean</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-1.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Marble Lungs
                            <small>Indian</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-8.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Blank Bloke
                            <small>Japanese</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-2.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Hip Sculling
                            <small>Cuban</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-6.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Flat Moon
                            <small>Nepalese</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-4.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Packed Puffs
                            <small>Malaysian></small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-9.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Clay Hike
                            <small>Swedish</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-2.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Hip Sculling
                            <small>Cuban</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-6.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Flat Moon
                            <small>Nepalese</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-4.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Packed Puffs
                            <small>Malaysian></small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="/assets/admin/img/user-9.jpg" alt=""/></a>
                        <h4 class="username text-ellipsis">
                            Clay Hike
                            <small>Swedish</small>
                        </h4>
                    </li>
                </ul>
            </div>
            <!-- end panel -->

        </div>
        <!-- end col-4 -->
    </div>
    <!-- end row -->
@stop
