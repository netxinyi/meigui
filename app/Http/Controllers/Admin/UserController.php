<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-05 14:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Register;
use App\Model\User;
use App\Enum\User as UserEnum;

class UserController extends Controller
{


    protected $viewPrefix = 'admin.user';


    public function index()
    {
        $where = $this->request()->all();

        $orderby = array_get($where, 'order', 'created_at');
        $sortby = array_get($where, 'sort', 'desc');


        $users = User::orderBy($orderby, $sortby);


        foreach (array('status', 'sex', 'level', 'marriage', 'work_province', 'work_city', 'mobile', 'education', 'house', 'children', 'salary') as $field) {

            if (array_has($where, $field) && $where[$field] != -1) {
                $users->where($field, $where[$field]);
            }
        }

        if (array_has($where, 'age_start') && $where['age_start'] != -1) {
            $users->where('birthday', '>=', ageToYear($where['age_start']));
        }
        if (array_has($where, 'age_end') && $where['age_end'] != -1) {
            $users->where('birthday', '<=', ageToYear($where['age_end']));
        }

        if (array_has($where, 'user_name')) {
            $users->where('user_name', 'like', '%' + $where['user_name'] + '%');
        }

        $users = $users->paginate(array_get($where, 'size', 10))->appends($this->request()->all());
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

            'mobile' => 'required|digits:11',
            'birthday' => 'required|date',
            'sex' => 'required|in:' . array_keys_impload(UserEnum::$sexLang),
            'password' => 'min:5|max:20',
            'password_confirm' => 'required_with:password|same:password',
            'marriage' => 'in:' . array_keys_impload(UserEnum::$marriageLang),
            'height' => 'numeric|digits:3|min:130|max:210',
            'education' => 'in:' . array_keys_impload(UserEnum::$educationLang),
            'salary' => 'in:' . array_keys_impload(UserEnum::$salaryLang)
        ]);

        $form = $this->request()->only([
            'user_name',
            'mobile',
            'birthday',
            'marriage',
            'height',
            'education',
            'salary',
            'work_province',
            'work_city',
            'level',
            'house',
            'children',
            'realname',
            'status'
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
            'mobile' => 'required|digits:11',
            'birthday' => 'required|date',
            'sex' => 'required|in:' . array_keys_impload(UserEnum::$sexLang),
            'password' => 'min:5|max:20',
            'password_confirm' => 'required_with:password|same:password',
            'marriage' => 'in:' . array_keys_impload(UserEnum::$marriageLang),
            'height' => 'numeric|digits:3|min:130|max:210',
            'education' => 'in:' . array_keys_impload(UserEnum::$educationLang),
            'salary' => 'in:' . array_keys_impload(UserEnum::$salaryLang),
            'user_name' => 'required|min:2|max:15',

        ]);


        $form = $this->request()->only([
            'user_name',
            'mobile',
            'birthday',
            'marriage',
            'height',
            'education',
            'salary',
            'work_province',
            'work_city',
            'level',
            'house',
            'children',
            'realname',
            'status'

        ]);

        if ($password = $this->request()->get('password')) {
            $form['password'] = $password;
        }

        $info = $this->request()->only(array(
            'stock', 'origin_province', 'origin_city', 'introduce'
        ));

        $object = $this->request()->get('object');

        try {
            transaction();
            $user->update($form);
            $user->info()->update($info);
            $user->object()->update($object);
            commit();
            return $this->redirect()->back()->withErrors(array('success' => '保存成功'));
        } catch (\Exception $e) {
            rollback();
        }

        return $this->redirect()->back()->withErrors(array('error' => '修改失败，请稍后再试'));
    }


    public function destroy(User $user)
    {

        if ($user->delete()) {
            return $this->success('删除成功');
        }

        return $this->error('删除失败');
    }

    public function getRegister()
    {
        $user = User::status(UserEnum::STATUS_NOCHECK)->get();

        return $this->view('check')->with('users', $user);
    }

    public function getAdd(Register $register)
    {


        return $this->view('add')->with('user', $register);
    }

    public function postAdd(Register $register)
    {
        //验证表单
        $this->validate($this->request(), [

            'mobile' => 'required|digits:11',
            'birthday' => 'required|date',
            'sex' => 'required|in:' . array_keys_impload(UserEnum::$sexForm),
            'password' => 'required|min:5|max:20',
            'password_confirm' => 'required|required_with:password|same:password',
            'marital_status' => 'in:' . array_keys_impload(UserEnum::$maritalForm),
            'height' => 'digits:3|between:130,210',
            'education' => 'in:' . array_keys_impload(UserEnum::$educationForm),
            'salary' => 'in:' . array_keys_impload(UserEnum::$salaryForm),
            'user_name' => 'required|min:2|max:15|unique:users',
            'email' => 'required|email|unique:users',
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

        try {
            transaction();
            $user = User::create($form);
            $register->delete();
            commit();
            return $this->success('添加成功', $user);

        } catch (\Exception $exp) {
            rollback();
            return $this->error('抱歉,添加失败');
        }

    }

    public function destroyRegister(Register $register)
    {
        try {
            $register->delete();
        } catch (\Exception $ex) {

        }
    }
}