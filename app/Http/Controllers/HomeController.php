<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;

use DB;
use App\Model\User;
use App\Http\Controllers\Session;
use App\Model\UserGallery;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class HomeController extends Controller
{

    protected $viewPrefix = 'home';

    public function getIndex()
    {
        return $this->view('index');
    }

    public function getXiangxi()
    {
        return $this->view('xiangxi');
    }

    public function getAvatar()
    {
        return $this->view('avatar');
    }

    public function getGallery()
    {
        return $this->view('gallery');

    }

    public function getZeou()
    {
        return $this->view('zeou');

    }

    public function getJieshao()
    {
        return $this->view('jieshao');

    }

    // 保存基本信息
    public function postUpdate()
    {
        //接收数据
        $data = $this->request()->only('user_name', 'height', 'education', 'marriage', 'salary');

        $this->validate($this->request(), array(
            'user_name' => 'required',
        ), array(
            'user_name.required' => '昵称不能为空！',
        ));

        user()->update($data);
        return $this->success('修改成功！');

    }


    // 保存详细信息
    public function postXiangxi()
    {
        //接收数据
        $info_data = $this->request()->only('card', 'stock', 'qq', 'email', 'origin_province', 'origin_city');
        $user_data = $this->request()->only('mobile');

        $this->validate($this->request(), $rules = array(
            'mobile' => 'required|digits:11|exists:users',
            'qq' => 'numeric',
            'email' => 'email',
        ), array(
            'mobile.required' => '手机号码不能为空',
            'mobile.digits' => '手机号码是11位',
            'qq.numeric' => 'QQ格式有误',
            'email.email' => '邮箱格式有误',
        ));

        user()->info()->update($info_data);
        user()->update($user_data);
        return $this->success('修改成功！');

    }

    // 保存自我介绍信息
    public function postJieshao()
    {
        //接收数据
        $data = $this->request()->only('introduce');

        $this->validate($this->request(), $rules = array(
            'introduce' => 'required',

        ), array(
            'introduce.required' => '自我介绍内容不能为空',

        ));

        user()->info()->update($data);
        return $this->success('修改成功！');

    }

    // 保存择偶条件
    public function postZeou()
    {

        //接收数据
        $data = $this->request()->only('age_start', 'age_end', 'marriage', 'house', 'origin_province', 'origin_city', 'education', 'children', 'salary_start', 'salary_end', 'height_start', 'height_end');

        user()->object()->update($data);
        return $this->success('修改成功！');

    }


    public function postPhoto()
    {
        $file = $this->request()->file('file');


        if ($file->isValid()) {

            try {
                $path = '/uploads/gallery/' . user()->user_id . '/';
                $name = md5($file->getClientOriginalName() . microtime(true));
                $name .= '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . $path, $name);
                $photo = new UserGallery(array(
                    'status' => \App\Enum\User::GALLERY_CHECK,
                    'image_url' => $path . $name
                ));
                user()->gallery()->save($photo);
                return $this->rest()->success($photo, '上传成功');
            } catch (\Exception $e) {
                return $this->rest()->error('上传失败,请稍后再试');
            }

        } else {
            return $this->rest()->error($file->getErrorMessage());
        }

    }


    public function deletePhoto($id)
    {
        try {

            $file = UserGallery::where('user_id', user()->user_id)->find($id);
            if ($file) {
                $file->delete();
                return $this->rest()->success(array(), '删除成功');
            }
            return $this->rest()->error('文件不存在');

        } catch (\Exception $e) {
            return $this->rest()->error('删除失败');
        }
    }

    public function postTouxiang()
    {
        //接收数据

        $data = $this->request()->only('avatar');
        user()->update($data);

        return $this->success('保存成功');

    }

    public function postGallery()
    {
        //接收数据
        $data = $this->request()->only('image_url', 'user_id');
        $user_id = $data['user_id'];

        $num = DB::table('user_gallery')->where('user_id', $data['user_id'])->count();

        // 判断是否有数据
        if ($num == 0) {
            // 如果没有，就插入数据
            foreach ($data['image_url'] as $key => $value) {
                DB::table('user_gallery')->insert(array('user_id' => $user_id, 'image_url' => $value));
            }

        } else {
            //已经有数据，更新即可
            foreach ($data['image_url'] as $key => $value) {
                DB::table('user_gallery')->where('user_id', $user_id)->where('photo_id', $key)->update(array('image_url' => $value));
            }

        }

        return $this->success('提交成功');

    }

}