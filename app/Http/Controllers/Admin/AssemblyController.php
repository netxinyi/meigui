<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Assembly;

class AssemblyController extends Controller
{


    use ResourceTrait;

    /**
     * 文章模型
     * @var
     */
    protected $model = Assembly::class;


    /**
     * 模板目录前缀
     * @var string
     */
    protected $viewPrefix = 'admin.assembly';


    /**
     * 显示文章管理首页
     * @return $this
     */
    public function index()
    {

        $models = Assembly::all(['assembly_id', 'admin_id', 'title','index_status', 'created_at']);
        $models->load(['admin']);

        return $this->view('index')->with('models', $models);
    }


    /**
     * 显示发表文章页面
     * @return $this
     */
    public function create()
    {

        return $this->view('create');
    }


    public function edit(Assembly $model)
    {

        return $this->view('edit')->with('model', $model);
    }

    public function store()
    {

        $this->validate($this->request(),$rules = array(
            'title'     => 'required|max:255',
            'content'   => 'required|min:10',
        ), $message = [
            'title.required'  => '请填写标题',
            'title.max'       => '标题太长',
            'content.required' =>'文章内容不能为空'
        ], $customAttributes = [

        ]);


        $form             = $this->request()->all();
        $form['admin_id'] = admin()->admin_id;
        if ($model = with(new $this->model)->create($form)) {
            return $this->success('添加成功', $model);
        }

        return $this->error('添加失败');
    }

}