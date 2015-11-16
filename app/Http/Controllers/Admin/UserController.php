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

        $users = User::all(['user_id', 'user_name', 'sex', 'email', 'mobile', 'created_at', 'age']);

        return $this->view('index')->with('users', $users);
    }


    public function create()
    {


        return $this->view('create');

    }


    public function store()
    {

        //验证表单
        $this->validate($this->request(), [

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


    public function edit(User $user)
    {

        return $this->view('edit')->withUser($user);

    }


    public function update(User $user)
    {

        //验证表单
        $this->validate($this->request(), [
            'mobile'           => 'required|digits:11',
            'birthday'         => 'required|date',
            'sex'              => 'required|in:' . array_keys_impload(UserEnum::$sexForm),
            'password'         => 'min:5|max:20',
            'password_confirm' => 'required_with:password|same:password',
            'marital_status'   => 'in:' . array_keys_impload(UserEnum::$maritalForm),
            'height'           => 'numeric|digits:3|min:130|max:210',
            'education'        => 'in:' . array_keys_impload(UserEnum::$educationForm),
            'salary'           => 'in:' . array_keys_impload(UserEnum::$salaryForm),
            'user_name'        => 'required|min:2|max:15|unique:users,user_name,' . $user->user_id . ',user_id',
            'email'            => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
        ]);


        $form = $this->request()->only([
            'user_name',
            'email',
            'mobile',
            'birthday',
            'marital_status',
            'height',
            'education',
            'salary',
            'province',
            'city',
            'area'
        ]);

        if ($password = $this->request()->get('password')) {
            $form['password'] = $password;
        }

        if ($user->update($form)) {
            return $this->success('保存成功', $user);
        }

        return $this->error('修改失败，请稍后再试');
    }


    public function destroy(User $user)
    {

        if ($user->delete()) {
            return $this->success('删除成功');
        }

        return $this->error('删除失败');
    }
}