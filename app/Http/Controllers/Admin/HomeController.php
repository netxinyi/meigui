<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-09 22:32
 */

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use App\Model\AdminMessage;
use App\Model\Comment;
use App\Model\GuestBook;
use App\Model\User;

class HomeController extends Controller
{


    protected $viewPrefix = 'admin.home';


    //后台首页
    public function index()
    {

        //总访问量
        $visits = \Cache::get('visits', 0);
        //今日注册用户
        $todayUsers = User::today()->count('user_id');
        //总用户数
        $totalUsers = User::count('user_id');
        //管理员聊天记录
        $chatMessages = AdminMessage::with('admin')->limit(10)->oldest()->get();
        //最新留言
        $guestBook = GuestBook::with('user')->limit(10)->oldest()->get();
        //最新注册用户
        $users = User::limit(24)->oldest()->get();
        //最新评论
        $comments = Comment::limit(10)->oldest()->get();


        // 总会员数量/待审核会员/普通会员/高端会员
        $user_all_num = DB::table('users')->count('user_id');
        $user_shenhe_num = DB::table('users')->where('status','待审核')->count('user_id');
        $user_level1_num = DB::table('users')->where('level',1)->count('user_id');
        $user_level2_num = DB::table('users')->where('level',2)->count('user_id');
        $user_level3_num = DB::table('users')->where('level',3)->count('user_id');

        // 自我介绍待审核数量
        $user_info_num = DB::table('user_info')->where('introduce_status','等待审核')->count('user_id');

        // 会员相片审核数量
        $user_gallery_num = DB::table('user_gallery')->where('status','待审核')->where('image_url','!=','')->count('photo_id');

        // 文章数量
        $user_info_num = DB::table('articles')->count('article_id');
        $res = array(
            'user_all_num'=>$user_all_num,
            'user_shenhe_num'=>$user_shenhe_num,
            'user_level1_num'=>$user_level1_num,
            'user_level2_num'=>$user_level2_num,
            'user_level3_num'=>$user_level3_num,
            'user_info_num'=>$user_info_num,
            'user_gallery_num'=>$user_gallery_num,
            'user_info_num'=>$user_info_num,
            );

        return $this->view('index',$res);


        // return $this->view('index')->with('visits', $visits)->with('todayUsers', $todayUsers)->with('totalUsers',
        //         $totalUsers)->with('chatMessages', $chatMessages)->with('guestBook', $guestBook)->with('users',
        //         $users)->with('comments', $comments);

    }
}