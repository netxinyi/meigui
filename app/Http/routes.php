<?php

Route::bind('admins', function ($admin_id) {

    return App\Model\Admin::find($admin_id);
});
Route::model('user', 'App\Model\User');
Route::model('column', 'App\Model\Column');
Route::model('article', 'App\Model\Article');
Route::model('guestbook', 'App\Model\GuestBook');
Route::model('register', 'App\Model\Register');
Route::model('scase', 'App\Model\Scase');
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

/*
|--------------------------------------------------------------------------
| 用户中心
|--------------------------------------------------------------------------
|
*/

Route::group(array('middleware' => 'auth'), function () {

    Route::controller('home', 'HomeController');
});


/*
|--------------------------------------------------------------------------
| 会员专区
|--------------------------------------------------------------------------
|
*/
Route::get('member', 'MemberController@index');
Route::get('male_member', 'MemberController@getMale');
Route::get('female_member', 'MemberController@getFemale');
Route::get('viplist_member', 'MemberController@getViplist');
Route::get('member/{user}', 'MemberController@user');
Route::get('yylist', 'ScaseController@getYylist');
Route::get('scase/yydetail/{scase}', 'ScaseController@yydetail');
Route::get('jjlist', 'ScaseController@getJjlist');
Route::get('scase/jjdetail/{scase}', 'ScaseController@jjdetail');
/*
|--------------------------------------------------------------------------
| 文章
|--------------------------------------------------------------------------
|
*/
Route::get('article/{article}', 'ArticleController@index');

/*
|--------------------------------------------------------------------------
| Auth支持-控制器路由
|--------------------------------------------------------------------------
|
*/
#Auth登录注册-密码找回-控制器路由
Route::controllers([

    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
/*
|--------------------------------------------------------------------------
| 微信
|--------------------------------------------------------------------------
|
*/
Route::controller('weixin', 'WechatController');

/*
|--------------------------------------------------------------------------
| 后台管理
|--------------------------------------------------------------------------
*/
#Auth-后台登录验证
Route::controller('admin/auth', 'Admin\AuthController');

#后台管理
Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function () {

    Route::get('/', ['uses' => 'Admin\HomeController@index']);
    #Option管理-资源路由
    Route::controller('option', 'Admin\OptionController');

    #栏目管理
    Route::resource('column', 'Admin\ColumnController');
    #文章管理
    Route::resource('article', 'Admin\ArticleController');
    #评论管理
    Route::resource('comment', 'Admin\CommentController');
    #留言管理
    Route::resource('guestbook', 'Admin\GuestbookController');

    #用户审核
    Route::get('user/register', array('uses' => 'Admin\UserController@getRegister', 'as' => 'admin.user.check'));
    Route::post('user/register', 'Admin\UserController@postRegister');

    Route::get('user/{register}/add', array('uses' => 'Admin\UserController@getAdd', 'as' => 'admin.register.add'));
    Route::post('user/{register}/add', array('uses' => 'Admin\UserController@postAdd'));

    Route::get('user/{register}/checkout', array('uses' => 'Admin\UserController@destroyRegister', 'as' => 'admin.register.destroy'));


    #用户管理
    #自我介绍
    Route::get('user/introduce', array('uses' => 'Admin\UserController@getIntroduce', 'as' => 'admin.user.introduce'));
    Route::post('user/setIntroduceStatus', array('uses' => 'Admin\UserController@setIntroduceStatus', 'as' => 'admin.user.setIntroduceStatus'));

    #会员展示推荐
    Route::get('user/recommend', array('uses' => 'Admin\UserController@getRecommend', 'as' => 'admin.user.recommend'));
    Route::post('user/setRecommendPage', array('uses' => 'Admin\UserController@setRecommendPage', 'as' => 'admin.user.setRecommendPage'));
    Route::post('user/setTuiUser', array('uses' => 'Admin\UserController@setTuiUser', 'as' => 'admin.user.setTuiUser'));

    #会员相片审核
    Route::get('user/gallerylist', array('uses' => 'Admin\UserController@getGallerylist', 'as' => 'admin.user.gallerylist'));
    Route::post('user/setGalleryStatus', array('uses' => 'Admin\UserController@setGalleryStatus', 'as' => 'admin.user.setGalleryStatus'));

    Route::resource('user', 'Admin\UserController');
    Route::post('scase/image', 'Admin\ScaseController@postImage');


    #成功案例
    Route::resource('scase', 'Admin\ScaseController');
    Route::controller('image', 'Admin\ImageCenterController');

    Route::group(array('middleware' => 'auth.admin.super'), function () {
        #管理员管理
        Route::resource('admins', 'Admin\AdminController', ['middleware' => 'auth.admin.super']);
    });

});

//首页
Route::controller('/', 'IndexController');