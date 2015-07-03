<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Http\Controllers\Admin;

#继承Controller
use App\Http\Controllers\Controller;
#Option模型
use App\Model\Option;
use App\Enum\Option as OptionEnum;

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
    public function index()
    {

        //查询所有Options
        $options = Option::all();

        //响应一个模板
        return $this->view('index', ['options' => $options]);

    }


    public function create()
    {

        return $this->view('create');
    }


    public function store()
    {

        $this->validate([
            'title' => 'required|max:100',
            'code'  => 'required|max:50|alpha|unique:options',
            'desc'  => 'max:255',
            'type'  => 'required|in:' . implode(',', OptionEnum::$inputTypes),
            'value' => 'max:255'
        ], [
            'title.required' => '请填写标题',
            'title.max'      => '标题最长不能超过100个字符',
            'code.required'  => '请填写编码',
            'code.max'       => '编码最长不能超过50个字符',
            'code.alpha'     => '编码只能由纯字母组成',
            'code.unique'    => '编码已存在',
            'type.required'  => '请选择录入方式',
            'type.in'        => '请选择录入方式',
            'value.max'      => '默认值最长不能超过255个字符'
        ]);

        $form             = $this->request()->only(['title', 'code', 'desc', 'type', 'value', 'values']);
        $form['autoload'] = $this->request()->has('autoload');

        if ($option = Option::create($form)) {

            return $this->success('添加成功', $option, $this->redirect()->back());

        }

        return $this->error('添加失败');

    }

}