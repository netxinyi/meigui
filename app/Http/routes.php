<?php

Route::bind('admins', function ($admin_id){

    return App\Model\Admin::find($admin_id);
});
Route::model('user', 'App\Model\User');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){

    return Response::make('welcome');
});


/*
|--------------------------------------------------------------------------
| Auth支持-控制器路由
|--------------------------------------------------------------------------
|
*/
#Auth登录注册-密码找回-控制器路由
Route::controllers([

    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

/*
|--------------------------------------------------------------------------
| 后台管理
|--------------------------------------------------------------------------
*/
#Auth-后台登录验证
Route::controller('admin/auth', 'Admin\AuthController');
#后台管理
Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function (){

    Route::get('/', function (){

        return view('admin.index');
    });
    #Option管理-资源路由
    Route::resource('option', 'Admin\OptionController', ['only' => ['index', 'store']]);
    #管理员管理
    Route::resource('admins', 'Admin\AdminController', ['middleware' => 'auth.admin.super']);
    #栏目管理
    Route::resource('column', 'Admin\ColumnController');
    #文章管理
    Route::resource('article', 'Admin\ArticleController');
    #用户管理
    Route::resource('user', 'Admin\UserController');

});


Route::group(['prefix' => 'api'], function (){


    #省份地区
    Route::get('area/{province_id?}/{city_id?}', function ($province = null, $city = null){

        $ares = file_get_contents(public_path() . '/static/areas');
        $area = json_decode($ares, true);
        if (!is_null($province)) {
            $key = rtrim($province . '.' . $city, '.');
            $ret = array_get($area, $key);
        } else {
            $ret = $area;
        }

        return app('App\Providers\Rest\RestService')->make($ret);

    });
});
