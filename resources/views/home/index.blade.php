@extends('home.layout')

@section('content')
    <form class="am-form" id="index-form" method="post" onsubmit="return false;" action="home/update"
 >
        <div class="am-panel am-panel-default">
            <header class="am-panel-hd">
                <h3 class="am-panel-title">基本信息</h3>
            </header>
            <div class="am-panel-bd">

                <table class="am-table am-table-striped am-table-hover ">
                    <tr>
                        <td>昵称：</td>
                        <td><input type="text" name="user_name"  value="{{user()->user_name}}"></td>
                        <td>不能为空</td>
                    </tr>
                    <tr>
                        <td>性别：</td>
                        <td>{{user()->sex_lang}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>出生日期：</td>
                        <td>{{user()->birthday}}</td>
                        <td>可联系管理员修改</td>
                    </tr>
                    <tr>
                        <td>身高：</td>
                        <td>
                            <select id="doc-select-1" name="height">
                                <?php 
                                    for ($x=130; $x<=226; $x++) {

                                        if($x == user()->height){
                                            echo '<option value="'.$x.'"  selected="selected">'.$x.'cm</option>';
                                        }else{
                                            echo '<option value=" '.$x.'">'.$x.'cm</option>';
                                        }
                                    } 
                                ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>学历：</td>
                        <td>
                            <select name="education" id="">
                                @foreach(App\Enum\User::$educationLang as $key=>$val)
                                    @if(user()->education == $key)
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
                        <td>婚姻状况：</td>
                        <td>
                            <select name="marriage" id="">
                                @foreach(App\Enum\User::$marriageLang as $key=>$val)
                                    @if(user()->marriage == $key)
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
                            <select name="salary" id="">
                                @foreach(App\Enum\User::$salaryLang as $key=>$val)
                                    @if(user()->salary == $key)
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
                        <td></td>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="am-btn am-btn-danger dy_btn_color" type="submit" >保存信息</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>

@stop

@section('footer-last-js')
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>

    $(function () {
             $('#index-form').success(function () {
               //$.redirect(null, 2);
             }).form();

        });
    </script>
@stop