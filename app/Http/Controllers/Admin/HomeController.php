<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-09 22:32
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdminMessage;
use App\Model\Option;
use App\Model\User;

class HomeController extends Controller
{


    protected $viewPrefix = 'admin.home';


    //后台首页
    public function index()
    {

        //总访问量
        $visits = Option::key('visits')->first()->value;
        //今日注册用户
        $todayUsers = User::today()->count('user_id');
        //总用户数
        $totalUsers = User::count('user_id');
        //管理员聊天记录
        $chatMessages = AdminMessage::with('admin')->limit(10)->latest()->get();

        return $this->view('index')->with('visits', $visits)->with('todayUsers', $todayUsers)->with('totalUsers',
                $totalUsers)->with('chatMessages', $chatMessages);

    }
}