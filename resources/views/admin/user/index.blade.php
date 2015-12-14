@extends('admin.master')

@section('title')
    会员列表 - 后台管理中心
@stop

<style>
    .form-group{text-align: center; }
    .btn.btn-info{margin-top:18px;}
    #content{padding: 0px;}
</style>
@section('content')

    <div class="p-20" style="padding:0px;">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-2 -->
            <div class="col-md-12">

                <div class="hidden-sm hidden-xs">
                    <form action="" method="get">
                        <div class="form-group col-md-3">
                              <label>查询</label>
                            <input type="text" name="keyword" class="form-control input-sm input-white"  placeholder="查询昵称/姓名/手机号" value="{{Request::get('keyword')}}">
                        </div>
                        <div class="form-group col-md-1">
                            <label>性别</label>
                            <select class="form-control input-sm input-white" name="sex">
                                <option value="-1">不限制</option>
                                @foreach(\App\Enum\User::$sexLang as $val=>$label)
                                    <option value="{{$val}}" {{queryActive('sex',$val,'selected')}}>{{$label}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>最小年龄</label>
                            <select class="form-control input-sm input-white" name="age_start">
                                <option value="-1">不限制</option>
                                @for($i=18;$i<=70;$i++)
                                    <option value="{{$i}}" {{queryActive('age_start',$i,'selected')}}>{{$i}} 岁</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>最大年龄</label>
                            <select class="form-control input-sm input-white" name="age_end">
                                <option value="-1">不限制</option>
                                @for($i=18;$i<=70;$i++)
                                    <option value="{{$i}}" {{queryActive('age_end',$i,'selected')}}>{{$i}} 岁</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>会员状态</label>
                            <select class="form-control input-sm input-white" name="status">
                                <option value="-1">不限制</option>
                                @foreach(\App\Enum\User::$statusLang as $val=>$label)
                                    <option value="{{$val}}" {{queryActive('status',$val,'selected')}}>{{$label}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>会员等级</label>
                            <select class="form-control input-sm input-white" name="level">
                                <option value="-1">不限制</option>
                                @foreach(\App\Enum\User::$levelLang as $val=>$label)
                                    <option value="{{$val}}" {{queryActive('level',$val,'selected')}}>{{$label}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-info btn-small">提交</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end col-2 -->
            <!-- begin col-10 -->
            <div class="col-md-12">
                
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                    <div class="email-content">
                        <table class="table table-email">
                            <thead>
                            <tr>
                                <th class="email-select">
                                    <a href="#" data-click="email-select-all">
                                        <i class="fa fa-square-o fa-fw"></i>
                                    </a>
                                </th>
                                <th>昵称</th>
                                <th>手机号</th>
                                <th>性别</th>
                                <th>年龄</th>
                                <th>身高</th>
                                <th>有无孩子</th>
                                <th>会员等级</th>
                                <th>注册时间</th>
                                <th>帐号状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i
                                                    class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">{{$user->user_name}}</td>
                                    <td>{{$user->mobile}} </td>
                                    <td>{{$user->sex_lang}}</td>
                                    <td>{{$user->age_lang}}</td>
                                    <td>{{$user->height_lang}}</td>
                                    <td>{{$user->children}}</td>
                                    <td class="email-date">{{$user->level_lang}}</td>
                                    <td class="email-date">{{$user->created_at}}</td>
                                     <td class="email-date">{{$user->status}}</td>
                                    <td>
                                        <button onclick="tui({{$user->user_id}})">推荐会员</button>
                                        <a class="btn btn-success btn-sm"   href="/admin/user/{{$user->user_id}}/edit">编辑</a>
                                        <a class="btn btn-danger btn-sm" href="/admin/user/{{$user->user_id}}" data-method="delete">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="email-footer clearfix">
                            共 {{$users->total() }} 条记录
                            <?php echo str_replace('pagination', 'pagination pagination-sm m-t-0 m-b-0 pull-right', $users->render());?>

                        </div>
                    </div>
             
            </div>
            <!-- end col-10 -->
        </div>
        <!-- end row -->
    </div>

    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/js/apps.min.js"></script>
    <script src="/assets/js/common/common.js"></script>

    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        function tui(user_id){
              var token = $("input[name='_token']").val();
                $.rest({
                 url:'/admin/user/setTuiUser',
                 method:'post',
                 data:{user_id:user_id,_token:token},
                 
                });
           
        }
    </script>

@stop
