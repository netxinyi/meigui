<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-05 14:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Enum\User as UserEnum;

class UserController extends Controller
{


    protected $viewPrefix = 'admin.user';


    public function index()
    {

        $users = User::all(['user_id', 'user_name', 'sex', 'email', 'mobile', 'created_at']);

        return $this->view('index')->with('users', $users);
    }


    public function create()
    {


        return $this->view('create');

    }


    public function store()
    {

        //验证表单
        $this->validate([

            'mobile'           => 'required|digits:11',
            'birthday'         => 'required|date',
            'sex'              => 'required|in:' . array_keys_impload(UserEnum::$sexForm),
            'password'         => 'required|min:5|max:20',
            'password_confirm' => 'required|required_with:password|same:password',
            'marital_status'   => 'in:' . array_keys_impload(UserEnum::$maritalForm),
            'height'           => 'digits:3|between:130,210',
            'education'        => 'in:' . array_keys_impload(UserEnum::$educationForm),
            'salary'           => 'in:' . array_keys_impload(UserEnum::$salaryForm),
            'user_name'        => 'required|min:2|max:15|unique:users',
            'email'            => 'required|email|unique:users',
        ]);

        $form = $this->request()->only([
            'user_name',
            'email',
            'mobile',
            'birthday',
            'password',
            'password_confirm',
            'marital_status',
            'height',
            'education',
            'salary',
            'province',
            'city',
            'area'
        ]);
        if ($user = User::create($form)) {
            return $this->success('添加成功', $user);
        }

        return $this->error('添加失败');

    }
}