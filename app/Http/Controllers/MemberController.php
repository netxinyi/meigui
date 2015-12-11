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
        $recommends = UserRecommend::with(array(
            'user' => function ($query) {
                //只需要正常状态的会员
                return $query->status()->select('user_id', 'avatar', 'user_name', 'work_city', 'height', 'education', 'salary', 'birthday', 'level', 'sex');
            },
            'user.like' => function ($query) {
                return $query->select('id');
            }
        ))->home()->orderBy('order')->get(array('user_id'))->all();

        $users = array(
            'male' => array(),
            'female' => array(),
            'vip' => array()
        );
        foreach ($recommends as $recommend) {
            foreach ($recommend->user->all() as $user) {
                if ($user->sex == userEnum::SEX_FEMALE) {
                    $users['female'][] = $user;
                } else if ($user->level == userEnum::LEVEL_1) {
                    $users['male'][] = $user;
                } else if ($user->level == userEnum::LEVEL_3) {
                    $users['vip'][] = $user;
                }
            }
        }

		//筛选出鸳鸯谱的所有案例
		$case = Scase::where('publish_type','=',scaseEnum::PUBLISH_YUANYANGPU)->get();
        return $this->view('index')->with('users', $users)->with('case',$case);
    }

    public function getMale()
    {
        $recommends = UserRecommend::with(array(
            'user' => function ($query) {
                //只需要正常状态的会员
                return $query->status()->male()->level();
            }
        ))->home()->orderBy('order')->get()->all();
        $users = array();
        foreach ($recommends as $recommend) {

            $users = array_merge($users, $recommend->user->all());
        }
        return $this->view('male')->with('users', $users);
    }

    public function getFemale()
    {
        $recommends = UserRecommend::with(array(
            'user' => function ($query) {
                //只需要正常状态的会员
                return $query->status()->female();
            }
        ))->home()->orderBy('order')->get()->all();
        $users = array();
        foreach ($recommends as $recommend) {

            $users = array_merge($users, $recommend->user->all());
        }

        return $this->view('female')->with('users', $users);
    }

    public function getViplist()
    {
        $recommends = UserRecommend::with(array(
            'user' => function ($query) {
                //只需要正常状态的会员
                return $query->status()->male()->level(userEnum::LEVEL_3);
            }
        ))->home()->orderBy('order')->get()->all();
        $users = array();
        foreach ($recommends as $recommend) {

            $users = array_merge($users, $recommend->user->all());
        }
        return $this->view('viplist')->with('users', $users);
    }

    public function user(User $user)
    {
        $status = $user['status'];
		if($status !== userEnum::STATUS_OK){
			return redirect('/member')->with('status', '该会员尚未通过审核');
		}else{
			return $this->view('vip')->with('user', $user);
		}
    }

}