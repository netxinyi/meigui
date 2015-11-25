<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;


use App\Model\User;
use App\Model\Register;

class MemberController extends Controller
{

    protected $viewPrefix = 'member';

    public function index()
    {
        $selects = array('user_id','user_name', 'avatar', 'sex', 'height', 'birthday', 'province', 'salary', 'height', 'education');
        $user['male']   = User::male()->limit(18)->get($selects);
        $user['female'] = User::female()->limit(18)->get($selects);
		$viplevel = 3;
		$user['vip']  = User::where('level','>',$viplevel)->limit(18)->get($selects);
        return $this->view('index')->with('users', $user);
    }

    public function getMale()
    {
		$selects = array('user_id','user_name', 'avatar', 'sex', 'height', 'birthday', 'province', 'salary', 'height', 'education');
		$user['male'] = User::male()->get($selects);
        return $this->view('male')->with('user',$user);
    }

    public function getFemale()
    {
		$selects = array('user_id','user_name', 'avatar', 'sex', 'height', 'birthday', 'province', 'salary', 'height', 'education');
		$user['female'] = User::female()->get($selects);
        return $this->view('female')->with('user',$user);
    }

	public function getViplist(){
		$selects = array('user_id','user_name', 'avatar', 'sex', 'height', 'birthday', 'province', 'salary', 'height', 'education');
		$viplevel = 3;
		$user['vip']  = User::where('level','>',$viplevel)->get($selects);
		//添加报名人数字段
		foreach($user['vip'] as $key=>$vip){
				$user['vip'][$key]['count']=Register::where('user_id','=',$vip['user_id'])->count();
		}
		return $this->view('viplist')->with('user',$user);
	}

    public function user(User $user)
    {
        return $this->view('vip')->with('user',$user);
    }

}