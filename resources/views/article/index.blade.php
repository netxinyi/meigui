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
                            关于我们
                        </dt>
                        <dd class="am-accordion-bd am-collapse am-in">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">公司简介1</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">公司简介2</a>
                                        <span class="am-list-date">2015-10-14</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">公司简介3</a>
                                        <span class="am-list-date">2015-11-18</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="am-accordion-item">
                        <dt class="am-accordion-title">
                            客服中心
                        </dt>
                        <dd class="am-accordion-bd am-collapse ">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">客服中心1</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">客服中心2</a>
                                        <span class="am-list-date">2015-10-14</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">客服中心3</a>
                                        <span class="am-list-date">2015-11-18</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">客服中心4</a>
                                        <span class="am-list-date">2015-11-18</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="am-accordion-item">
                        <dt class="am-accordion-title">
                            注册条款
                        </dt>
                        <dd class="am-accordion-bd am-collapse ">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">注册条款</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="am-accordion-item">
                        <dt class="am-accordion-title">
                            相亲通道
                        </dt>
                        <dd class="am-accordion-bd am-collapse ">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">相亲通道1</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">相亲通道2</a>
                                        <span class="am-list-date">2015-10-14</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="am-accordion-item">
                        <dt class="am-accordion-title">
                            交友信息
                        </dt>
                        <dd class="am-accordion-bd am-collapse ">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">交友信息1</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">交友信息2</a>
                                        <span class="am-list-date">2015-10-14</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">交友信息3</a>
                                        <span class="am-list-date">2015-11-18</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="am-accordion-item">
                        <dt class="am-accordion-title">
                            隐私保护
                        </dt>
                        <dd class="am-accordion-bd am-collapse ">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">隐私保护</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="am-accordion-item">
                        <dt class="am-accordion-title">
                            帮助中心
                        </dt>
                        <dd class="am-accordion-bd am-collapse ">
                            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
                            <div class="am-accordion-content">
                                <ul class="am-list">
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">帮助中心1</a>
                                        <span class="am-list-date">2015-09-18</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">帮助中心2</a>
                                        <span class="am-list-date">2015-10-14</span>
                                    </li>
                                    <li class="am-g am-list-item-dated">
                                        <a href="##" class="am-list-item-hd ">帮助中心3</a>
                                        <span class="am-list-date">2015-11-18</span>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
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
                            <h1 class="am-article-title">永远的蝴蝶</h1>

                            <p class="am-article-meta">发布时间：2015年10月12日 </p>
                        </div>
                        <div class="am-article-bd">
                            <p class="am-article-lead">
                                上海花千树信息科技有限公司（“世纪佳缘”）（纳斯达克代码：DATE）运营中国最大的在线婚恋交友平台，通过互联网、无线平台和线下活动为中国大陆、香港、澳门、台湾及
                                世界其它国家和地区的单身人士提供严肃婚恋交友服务。
                                2003年10月8日，复旦大学新闻学院研二女生龚海燕（北京大学中文系文学学士，网名小龙女）看到身边很多高学历的同学和朋友由于工作学习忙，而无法找到理想爱人，因此创办了世纪佳缘
                                ，并在一年内就成功找到了自己的先生，且因成就无数美满姻缘而被誉为“网络第一红娘”。自创建以来，世纪佳缘致力于提供可靠、有效、以用户为中心的在线婚恋交友平台，
                                帮助中国单身人士寻找幸福，成为推动中国婚恋交友行业发展的领先者。
                                2011年5月11日，世纪佳缘登陆美国纳斯达克全球精选市场进行首次公开募股，成为首家上市的中国在线婚恋交友平台，股票交易代码为“DATE”。根据艾瑞咨询的数据，2011年按
                                照独立用户访问量以及用户浏览时间，世纪佳缘在中国所有婚恋交友网站中均名列第一。截至2014年1月13日，世纪佳缘已拥有逾1亿注册用户。
                                ◇世纪佳缘定位
                                服务于真诚征友的单身人群，并建立严格的身份认证机制和会员投诉机制，通过客服人工审核、技术屏蔽以及会员投诉等方式屏蔽不良会员，尽最大努力维护征友会员的质量、征友过程的安
                                全，和在世纪佳缘征友的效果。
                                ◇世纪佳缘理念
                                打造真实交友、严肃婚恋的平台，倡导永恒真爱、才子佳人的良缘；
                                举办丰富多彩、热情洋溢的聚会，服务情趣高雅、真诚觅缘的会员；
                                承担和谐社会、幸福家庭的使命，追求恒久美好、幸福一生的佳缘。
                                成都宏达国际VIP服务中心：四川省成都市青羊区下南大街2号宏达国际广场22楼15-19室
                                邮编：610041
                                红娘热线：400-9205-006；15348176439（24h）（仅受理付费一对一红娘服务）
                                传真号码： 028-85355945

                                成都尊城国际VIP服务中心：四川省成都市金河路59号尊城国际1101室& 11楼7号
                                邮编：610000
                                红娘热线：400-6076-520(24h)；18280267096 (24h)（仅受理付费一对一红娘服务）

                                成都环球中心VIP服务中心：成都市高新区天府大道北段1700号(环球中心S2)6楼608、609室
                                红娘热线：15102836813 (24h)；13708099355（仅受理付费一对一红娘服务）

                                长沙汇金国际大厦VIP服务中心：湖南省长沙市天心区芙蓉路380号汇金国际大厦金座1302室
                                邮编：410000
                                红娘热线： 0731-83849520(24h)；15388953681(24h)；15388953791(24h)（仅受理付费一对一红娘服务）

                                长沙恒力卡瑞尔大厦VIP服务中心：长沙天心区劳动西路245号恒力卡瑞尔大厦
                                邮编：410000
                                红娘热线：0731-85058077(24h)；（仅受理付费一对一红娘服务）

                                重庆观音桥VIP服务中心：重庆市观音桥朗晴广场B塔42-2
                                邮编：400020
                                红娘热线：023-88732615（24h）；18580511165 （24h）（仅受理付费一对一红娘服务）

                                重庆大坪VIP服务中心：重庆市渝中区大坪龙湖时代天街3号楼25层世纪佳缘
                                邮编：400020
                                红娘热线：023-63871314（24h）；13368080520 （24h）（仅受理付费一对一红娘服务）

                                长春VIP服务中心：长春市朝阳区工农大路5号金谷国际13楼
                                邮编：131021
                                红娘热线：400-899-5888；15643911666（24h）（仅受理付费一对一红娘服务）

                                长春天骄大厦VIP服务中心：长春市南关区东南湖大路2052号，天骄大厦B座4单元13楼
                                红娘热线：0431-86106999(24h)（仅受理付费一对一红娘服务）

                                常州VIP服务中心：常州市天宁区延陵西路19号嘉宏世纪大厦6层
                                红娘热线： 18115075189(24h) （仅受理付费一对一红娘服务）

                                D

                                东莞VIP服务中心：广东省东莞市南城体育路2号鸿禧中心B区807室（体育馆斜对面）
                                邮编：523070
                                红娘热线：0769-27201055(24h)；13712949996（24h）（仅受理付费一对一红娘服务）

                                大连VIP服务中心：辽宁省大连市中山区友好广场友好大厦27层17号
                                邮编：116001
                                红娘热线：0411-39988082(24h)；15842693331(24h)（仅受理付费一对一红娘服务）

                                大连富鸿国际VIP服务中心：大连市沙河口区长兴街五四广场富鸿国际大厦C507室
                                红娘热线：0411-82299102(24h)；（仅受理付费一对一红娘服务）</p>
                        </div>
                    </article>
                </div>
            </div>
            <!-- 正文内容 end-->
        </div>
    </div>
@stop