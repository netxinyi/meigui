<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Pastevents;

class PasteventsController extends Controller
{


    use ResourceTrait;

    /**
     * 文章模型
     * @var
     */
    protected $model = Pastevents::class;


    /**
     * 模板目录前缀
     * @var string
     */
    protected $viewPrefix = 'admin.pastevents';


    /**
     * 显示文章管理首页
     * @return $this
     */
    public function index()
    {

        $models = Pastevents::all(['pastevents_id', 'admin_id', 'title','description','event_img','created_at']);
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


    public function edit(Pastevents $model)
    {

        return $this->view('edit')->with('model', $model);
    }

    public function store()
    {

        $this->validate($this->request(),$rules = array(
            'title'     => 'required|max:255',
            'description'=>'required',
            'content'   => 'required|min:10',
        ), $message = [
            'title.required'  => '请填写标题',
            'title.max'       => '标题太长',
            'description.required'  => '描述不能为空',
            'content.required' =>'文章内容不能为空',
            'content.min' =>'文章内容太短'
        ], $customAttributes = [

        ]);

        $form             = $this->request()->all();
        $form['admin_id'] = admin()->admin_id;
        if ($model = with(new $this->model)->create($form)) {
            return $this->success('添加成功', $model);
        }

        return $this->error('添加失败');
    }

    /*
	 * 图片上传
	 * */
    public function postImage()
    {
        $image = $this->request()->file('image');

        $name = md5($image->getClientOriginalName() . rand(100, 99999)) . '.' . $image->getClientOriginalExtension();
        $file = $image->move(public_path('/') . 'uploads/pastevents', $name);

        return array(
            'image' => array(
                'name' => $name,
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
                'url' => '/uploads/pastevents/'.$name
            )
        );
    }

}