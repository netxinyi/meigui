<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-05 14:43
 */

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Model\Register;
use App\Model\User;
use App\Enum\User as UserEnum;
use App\Model\UserInfo;
use App\Model\UserRecommend;
use App\Model\UserGallery;

class UserController extends Controller
{


    protected $viewPrefix = 'admin.user';


    public function index()
    {
        $where = $this->request()->all();

        $orderby = array_get($where, 'order', 'created_at');
        $sortby = array_get($where, 'sort', 'desc');


        \DB::enableQueryLog();
        $users = User::orderBy($orderby, $sortby);


        if (array_get($where, 'status')) {
            $users->status($where['status']);
        }

        if (array_get($where, 'level')) {
            $users->level($where['level']);
        }
        if (array_get($where, 'sex')) {
            $users->where('sex', $where['sex']);
        }

        if (array_get($where, 'age_start')) {
            $users->where('birthday', '<=', ageToYear($where['age_start']));
        }
        if (array_get($where, 'age_end')) {
            $users->where('birthday', '>=', ageToYear($where['age_end']));
        }

        if (array_get($where, 'keyword')) {

            $users->where(function ($query) use ($where) {
                $keyword = '%' . $where['keyword'] . '%';
                $query->where('user_name', 'like', $keyword)
                    ->orWhere('mobile', 'like', $keyword)
                    ->orWhere('realname', 'like', $keyword)
                    ->orWhere('user_id', 'like', $keyword);
            });
        }


        $users = $users->with('likeMe')->paginate(array_get($where, 'size', 10));

        foreach ($where as $key => $query) {
            if ($key && $query) {
                $users->appends($key, $query);
            }

        }

        return $this->view('index')->with('users', $users);
    }


    public function create()
    {


        return $this->view('create');

    }


    public function store()
    {

        //验证表单
        $this->validate($this->request(), $rules = array(
            'mobile' => 'required|digits:11|unique:users',
            'realname' => 'required',
            'birthday' => 'required|date',
            'sex' => 'required|in:' . array_keys_impload(UserEnum::$sexLang),
            'password' => 'min:5|max:20',
            'password_confirm' => 'required_with:password|same:password',
            'marriage' => 'in:' . array_keys_impload(UserEnum::$marriageLang),
            'height' => 'numeric|digits:3|min:130|max:210',
            'education' => 'in:' . array_keys_impload(UserEnum::$educationLang),
            'salary' => 'in:' . array_keys_impload(UserEnum::$salaryLang)

        ), $message = [
            'mobile.required' => '手机号不能为空',
            'mobile.digits' => '手机号格式不正确',
            'mobile.unique' => '手机号已经存在',
            'birthday.required' => '生日不能为空',
            'realname.required' => '真实姓名不能为空',
            'sex.required' => '性别不能为空',
            'password.min' => '密码最少5位',
            'password.max' => '密码最多20位',
            'password_confirm.same' => '两次输入的密码不一致',
        ], $customAttributes = [

        ]);

        $form = $this->request()->only([
            'user_name',
            'mobile',
            'realname',
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

        try {
            transaction();
            $user->gallery()->delete();
            $user->info()->delete();
            $user->object()->delete();
            $user->recommend()->delete();
            $user->like()->delete();
            $user->likeMe()->delete();
            $user->bind()->delete();
            $user->delete();
            commit();
            return $this->rest()->success(array(), '删除成功');
        } catch (\Exception $e) {
            rollback();
            return $this->rest()->error('删除失败,请稍后再试');
        }

    }

    //审核自我介绍
    public function getIntroduce()
    {

        $users = UserInfo::with('user')
            ->where('introduce_status', \App\Enum\User::INTRODUCE_CHECK)
            ->paginate(15);

        return $this->view('introduce')->with('users', $users);
    }

    // 自我介绍审核状态
    public function setIntroduceStatus()
    {
        $data = $this->request()->all();
        try {
            $userInfo = UserInfo::find($data['user_id']);
            if (!$userInfo) {
                return $this->rest()->error('不存在的用户');
            }

            $userInfo->introduce_status = $data['status'];
            if ($data['status'] == \App\Enum\User::INTRODUCE_OK) {
                $userInfo->introduce = $userInfo->new_introduce;
                $userInfo->new_introduce = NULL;
            }

            $userInfo->save();
            return $this->rest()->success(array(), '操作成功');
        } catch (\Exception $e) {
            return $this->rest()->error($e->getMessage());
        }


    }

    //会员展示推荐
    public function getRecommend()
    {

        $users = UserRecommend::with('user')->paginate(15);

        return $this->view('recommend')->with('users', $users);
    }

    public function getKeyword()
    {
        $key = $this->request()->get('keyword');

        if ($key) {
            $users = User::where(function ($query) use ($key) {
                $keyword = '%' . $key . '%';
                $query->where('user_name', 'like', $keyword)
                    ->orWhere('mobile', 'like', $keyword)
                    ->orWhere('realname', 'like', $keyword)
                    ->orWhere('user_id', 'like', $keyword);
            })->select('user_name', 'mobile', 'realname', 'user_id','avatar')->limit(20)->get();

            return $this->rest()->success($users, '查询成功');
        }

        return $this->rest()->success(array());
    }

    // 设置推荐状态
    public function setRecommendPage()
    {
        $data = $this->request()->only('id', 'page');
        DB::table("user_recommend")->where('id', $data['id'])->update(array('page' => $data['page']));


        return $this->success('操作成功');

    }

    // 会员推荐
    public function setTuiUser()
    {

        $user_id = $this->request()->get('user_id');
        $num = DB::table('user_recommend')->where('user_id', $user_id)->count();

        if ($num == 0) {
            $num = DB::table('user_recommend')->insert(array('user_id' => $user_id));
        }

        return $this->success('操作成功');

    }

    //会员相片审核
    public function getGallerylist()
    {
        $users = UserGallery::with('user')->where('status', UserEnum::GALLERY_CHECK)->paginate(15);

        return $this->view('gallery')->with('users', $users);
    }

    // 设置相片状态
    public function setGalleryStatus()
    {
        $data = $this->request()->only('photo_id', 'status');
        DB::table("user_gallery")->where('photo_id', $data['photo_id'])->update(array('status' => $data['status']));

        return $this->success('操作成功');

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