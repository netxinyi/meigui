<?php

Route::bind('admins', function ($admin_id){

    return App\Model\Admin::find($admin_id);
});
Route::model('user', 'App\Model\User');
Route::model('column', 'App\Model\Column');
Route::model('article', 'App\Model\Article');
Route::model('guestbook', 'App\Model\GuestBook');
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

    Route::get('/', ['uses' => 'Admin\HomeController@index']);
    #Option管理-资源路由
    Route::resource('option', 'Admin\OptionController', ['only' => ['index', 'store']]);
    #管理员管理
    Route::resource('admins', 'Admin\AdminController', ['middleware' => 'auth.admin.super']);
    #栏目管理
    Route::resource('column', 'Admin\ColumnController');
    #文章管理
    Route::resource('article', 'Admin\ArticleController');
    #评论管理
    Route::resource('comment', 'Admin\CommentController');
    #留言管理
    Route::resource('guestbook', 'Admin\GuestbookController');
    #用户管理
    Route::resource('user', 'Admin\UserController');
    #成功案例
    Route::resource('case', 'Admin\CaseController');

});