@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/detail.css">
@stop

@section('body')
    <div class="wap_vip search_bg">
        <div class="wap_vip_m">
            <div class="search_menu">
                <div class="menu_xuan">
                    我要找：
                    <select name="">
                        <option value="0">女朋友</option>
                        <option value="1">男朋友</option>
                    </select>
                </div>
                <div class="menu_xuan">
                    选择年龄：
                    <select name="">
                        <option value="0">18</option>
                        <option value="1">19</option>
                        <option value="1">20</option>
                        <option value="1">21</option>
                        <option value="1">22</option>
                        <option value="1">23</option>
                        <option value="1">24</option>
                        <option value="1">99</option>
                    </select>
                    至
                    <select name="">
                        <option value="0">不限制</option>
                        <option value="0">18</option>
                        <option value="1">19</option>
                        <option value="1">20</option>
                        <option value="1">21</option>
                        <option value="1">22</option>
                        <option value="1">23</option>
                        <option value="1">24</option>
                        <option value="1">99</option>
                    </select>
                </div>
                <div class="menu_xuan">
                    来自：
                    <select name="">
                        <option value="0">北京</option>
                        <option value="0">内蒙</option>
                        <option value="0">天津</option>
                        <option value="0">哈尔滨</option>
                        <option value="0">河北</option>
                        <option value="0">河南</option>
                    </select>
                </div>
                <div class="menu_xuan" id="menu_xuan_btn">
                    <button type="button" class="am-btn am-btn-danger ">搜索</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 搜索结果 -->
    <div class="wap_content_member">

        <div class="content_member">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-6 am-gallery-bordered"
                data-am-gallery="{  }">
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_1.jpg" alt="白富美1号"/>

                            <h3 class="am-gallery-title">Alan</h3>

                            <div class="am-gallery-desc">28岁，北京，185cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_2.jpg" alt="白富美1号"/>

                            <h3 class="am-gallery-title">起点</h3>

                            <div class="am-gallery-desc">27岁，北京，180cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item ">
                        <a href="./svip.html" class="">

                            <img src="./images/user_img/1_3.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">大猫 <span class="svip_tu">SVIP</span></h3>

                            <div class="am-gallery-desc">28岁，北京，177cm，本科，5000～10000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_4.jpg" alt="终会走过这条遥远的道路"/>

                            <h3 class="am-gallery-title">michael</h3>

                            <div class="am-gallery-desc">28岁，北京，183cm，硕士，10000～20000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_5.jpg" alt="某天 也许会相遇 相遇在这个好地方"/>

                            <h3 class="am-gallery-title">贺宁</h3>

                            <div class="am-gallery-desc">26岁，北京，180cm，本科，5000～10000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./svip.html" class="">
                            <img src="./images/user_img/1_6.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">狰狞之诗<span class="svip_tu">SVIP</span></h3>

                            <div class="am-gallery-desc">28岁，北京，184cm，本科，10000～20000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_7.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">Jason Z</h3>

                            <div class="am-gallery-desc">28岁，北京，185cm，本科，10000～20000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_8.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">chirs</h3>

                            <div class="am-gallery-desc">27岁，北京，185cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_9.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">浴缸</h3>

                            <div class="am-gallery-desc">26岁，北京，187cm，大专，10000～20000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./svip.html" class="">
                            <img src="./images/user_img/1_10.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">流年Triste<span class="svip_tu">SVIP</span></h3>

                            <div class="am-gallery-desc">28岁，北京，185cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_11.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">MARS</h3>

                            <div class="am-gallery-desc">28岁，北京，185cm，硕士，5000～10000元</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="./images/user_img/1_12.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">鸟鸟先生</h3>

                            <div class="am-gallery-desc">27岁，北京，184cm，本科，20000元以上</div>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="am-pagination am-pagination-right" id="fenye">
                <li class="am-disabled"><a href="#">&laquo;</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>

@stop

@section('footer-last-js')

    <script>

    </script>
@stop