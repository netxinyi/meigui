<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
#Option模型
use App\Model\Option;


class OptionController extends Controller
{


    /**
     * 模板前缀
     * @var string
     */
    protected $viewPrefix = 'admin.option';


    /**
     * Option管理首页
     * @return mixed
     */
    public function getBase()
    {

        //查询所有Options
        $options = [];


        Option::all(['key', 'value'])->each(function ($option) use (&$options) {

            $options[$option->key] = $option->value;
        });

        //响应一个模板
        return $this->view('index', ['options' => $options]);

    }

    public function postBase()
    {
        $this->validate($this->request(), [
            'site_name' => 'required|max:255',
            'site_url' => 'url',

        ], [
            'site_name.required' => '请填写网站名称',
            'site_name.max' => '网站名称最长不能超过255个字符',
            'site_url.url' => '网站地址格式不正确'
        ]);


        $options = $this->request()->only(['site_name', 'site_url', 'site_icp', 'site_keywords', 'site_description']);

        try {
            transaction();
            foreach ($options as $key => $option) {
                Option::where('key', $key)->update(['value' => $option]);
            }

            commit();

            return $this->success('保存成功');
        } catch (\Exception $exception) {
            rollback();

        }

        return $this->error('修改失败,请稍后再试');
    }

    public function getRecommend()
    {
        return $this->view('recommend');
    }

    public function getFlash()
    {
        return $this->view('flash');
    }

    public function getWechat()
    {
        return $this->view('wechat');
    }
}