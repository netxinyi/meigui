<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;


use App\Enum\User as userEnum;
use App\Model\User;
use App\Model\UserRecommend;
use App\Model\Scase;
use App\Enum\Scase as scaseEnum;

class MemberController extends Controller
{

    protected $viewPrefix = 'member';

    public function index()
    {

        $users['male'] = User::leftJoin('user_recommend', 'user_recommend.user_id', '=', 'users.user_id')
            ->where('user_recommend.page', \App\Enum\User::RECOMMEND_HOME)
            ->whereIn('level', array(\App\Enum\User::LEVEL_1))
            ->male()->limit(24)->orderBy('user_recommend.order')->get();


        $users['female'] = User::leftJoin('user_recommend', 'user_recommend.user_id', '=', 'users.user_id')
            ->where('user_recommend.page', \App\Enum\User::RECOMMEND_HOME)
            ->female()->limit(24)->orderBy('user_recommend.order')->get();

        $users['vip'] = User::leftJoin('user_recommend', 'user_recommend.user_id', '=', 'users.user_id')
            ->where('user_recommend.page', \App\Enum\User::RECOMMEND_HOME)
            ->male()->level(\App\Enum\User::LEVEL_3)->limit(24)->orderBy('user_recommend.order')->get();


        //筛选出鸳鸯谱的所有案例
        $case = Scase::where('publish_type', '=', scaseEnum::PUBLISH_YUANYANGPU)->get();
        return $this->view('index')->with('users', $users)->with('case', $case);
    }

    public function getMale()
    {
        $users = User::leftJoin('user_recommend', 'user_recommend.user_id', '=', 'users.user_id')
            ->where('user_recommend.page', \App\Enum\User::RECOMMEND_HOME)
            ->whereIn('level', array(\App\Enum\User::LEVEL_1))
            ->male()->orderBy('user_recommend.order')->paginate(36);

        $users->appends($this->request()->all());
        return $this->view('male')->with('users', $users);
    }

    public function getFemale()
    {
        $users = User::leftJoin('user_recommend', 'user_recommend.user_id', '=', 'users.user_id')
            ->where('user_recommend.page', \App\Enum\User::RECOMMEND_HOME)
            ->female()->limit(24)->orderBy('user_recommend.order')->paginate(36);
        $users->appends($this->request()->all());
        return $this->view('female')->with('users', $users);
    }

    public function getViplist()
    {
        $users = User::leftJoin('user_recommend', 'user_recommend.user_id', '=', 'users.user_id')
            ->where('user_recommend.page', \App\Enum\User::RECOMMEND_HOME)
            ->male()->level(\App\Enum\User::LEVEL_3)->limit(24)->orderBy('user_recommend.order')->paginate(36);
        $users->appends($this->request()->all());
        return $this->view('viplist')->with('users', $users);
    }

    public function user(User $user)
    {
        $status = $user['status'];
        if ($status == (userEnum::STATUS_OK)) {
            $tpl = $user->level == \App\Enum\User::LEVEL_1 ? 'vip' : 'svip';
            $user->load(array('gallery' => function ($query) {
                return $query->where('status', \App\Enum\User::GALLERY_OK);
            }));
            return $this->view($tpl)->with('user', $user);
        } else {
            return \Redirect::back()->with('status', '该会员尚未通过审核');
        }
    }

}