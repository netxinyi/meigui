@extends('home.layout')

@section('content')

    <form class="am-form" id="zeou-form" method="post" onsubmit="return false;" action="/home/zeou">
        <div class="am-panel am-panel-default">
            <header class="am-panel-hd">
                <h3 class="am-panel-title">择偶条件</h3>
            </header>
            <div class="am-panel-bd">
                <table class="am-table am-table-striped am-table-hover " id="zeou_table">
                    <tr>
                        <td>年龄：</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                <select class="zeou_table_select" name="age_start">
                                    <option value="">不限</option>
                                     <?php 
                                        for ($x=18; $x<=99; $x++) {
                                            if(User()->object->age_start == $x){
                                                echo '<option value=" '.$x.'" selected="selected">'.$x.'岁</option>';
                                            }else{
                                                echo '<option value=" '.$x.'">'.$x.'岁</option>';
                                            }
                                        } 
                                     ?>
                                </select>
                            </div>
                            <div class="zeou_table_select_n_left"><span>&nbsp &nbsp至 &nbsp &nbsp</span></div>
                            <div class="zeou_table_select_n_left">
                                <select class="zeou_table_select" name="age_end">
                                    <option value="">不限</option>
                                    <?php 
                                        for ($x=18; $x<=99; $x++) {
                                            if(User()->object->age_end == $x){
                                                echo '<option value=" '.$x.'" selected="selected">'.$x.'岁</option>';
                                            }else{
                                                echo '<option value=" '.$x.'">'.$x.'岁</option>';
                                            }
                                        } 
                                     ?>
                                </select>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>婚姻状况：</td>
                        <td>
                            <select name="marriage"  class="zeou_table_select">
                                <option value="">不限</option>
                                @foreach(App\Enum\User::$marriageLang as $key=>$val)
                                    @if(User()->object->marriage == $key)
                                        <option value="{{$key}}" selected="selected">{{$val}}</option>
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>居住情况：</td>
                        <td>
                            <select name="house"  class="zeou_table_select">
                                <option value="">不限</option>
                                 @foreach(App\Enum\User::$houseLang as $key=>$val)
                                    @if(User()->object->house == $key)
                                        <option value="{{$key}}" selected="selected">{{$val}}</option>
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>籍贯：</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                 <select name="origin_province"  class="zeou_table_select"></select>
                            </div>
                            <div class="zeou_table_select_n_left">
                                 <select name="origin_city" class="zeou_table_select"></select>
                            </div>
                           
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>学历：</td>
                        <td>
                            <select name="education"  class="zeou_table_select">
                                <option value="">不限</option>
                                 @foreach(App\Enum\User::$educationLang as $key=>$val)
                                    @if(user()->object->education == $key)
                                        <option value="{{$key}}" selected="selected">{{$val}}</option>
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>有无孩子：</td>
                        <td>
                            <select name="children"  class="zeou_table_select">
                                <option value="">不限</option>
                                 @foreach(App\Enum\User::$childrenLang as $key=>$val)
                                    @if(user()->object->children == $key)
                                        <option value="{{$key}}" selected="selected">{{$val}}</option>
                                    @else
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>月薪：</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select" name="salary_start">
                                    <option value="">不限</option>
                                    @foreach(App\Enum\User::$salaryObjectLang as $key=>$val)
                                        @if(user()->object->salary_start == $key)
                                            <option value="{{$key}}" selected="selected">{{$val}}</option>
                                        @else
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="zeou_table_select_n_left"><span>&nbsp &nbsp至 &nbsp &nbsp</span></div>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select" name="salary_end">
                                    <option value="">不限</option>
                                    @foreach(App\Enum\User::$salaryObjectLang as $key=>$val)
                                        @if(user()->object->salary_end == $key)
                                            <option value="{{$key}}" selected="selected">{{$val}}</option>
                                        @else
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>身高：</td>
                        <td>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select" name="height_start">
                                    <option value="">不限</option>
                                    <?php 
                                        for ($x=130; $x<=226; $x++) {
                                            if($x == user()->object->height_start){
                                                echo '<option value="'.$x.'"  selected="selected">'.$x.'cm</option>';
                                            }else{
                                                echo '<option value=" '.$x.'">'.$x.'cm</option>';
                                            }
                                        } 
                                    ?>
                                </select>
                            </div>
                            <div class="zeou_table_select_n_left"><span>&nbsp &nbsp至 &nbsp &nbsp</span></div>
                            <div class="zeou_table_select_n_left">
                                <select  class="zeou_table_select" name="height_end">
                                    <option value="">不限</option>
                                    <?php 
                                        for ($x=130; $x<=226; $x++) {
                                            if($x == user()->object->height_end){
                                                echo '<option value="'.$x.'"  selected="selected">'.$x.'cm</option>';
                                            }else{
                                                echo '<option value=" '.$x.'">'.$x.'cm</option>';
                                            }
                                        } 
                                    ?>
                                </select>
                            </div>
                            <div></div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="am-btn am-btn-danger dy_btn_color">保存信息</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@stop
@section('footer-last-js')
    <script src="/assets/lib/pcas/pcas.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>
        //省市区三级联动，无默认，无文字提示
        new PCAS("origin_province","origin_city","{{user()->object->origin_province}}","{{user()->object->origin_city}}");
       
        $(function () {
             $('#zeou-form').success(function () {
               //$.redirect(null, 2);
             }).form();

        });
    </script>
@stop