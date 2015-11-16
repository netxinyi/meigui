<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-04 23:58
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Column;

class ArticleController extends Controller
{


    use ResourceTrait;

    /**
     * 文章模型
     * @var
     */
    protected $model = Article::class;


    /**
     * 模板目录前缀
     * @var string
     */
    protected $viewPrefix = 'admin.article';


    /**
     * 显示文章管理首页
     * @return $this
     */
    public function index()
    {

        $models = Article::all(['article_id', 'admin_id', 'column_id', 'title', 'created_at']);
        $models->load(['admin', 'column']);

        return $this->view('index')->with('models', $models);
    }


    /**
     * 显示发表文章页面
     * @return $this
     */
    public function create()
    {

        $colums = Column::all(['column_id', 'column_name']);

        return $this->view('create')->with('columns', $colums);
    }


    public function edit(Article $model)
    {

        $colums = Column::all(['column_id', 'column_name']);


        return $this->view('edit')->with('columns', $colums)->with('model', $model);
    }

    public function store()
    {

        $this->validate($this->request(), [
            'title'     => 'required|max:255',
            'content'   => 'required|min:10',
            'column_id' => 'required'
        ]);


        $form             = $this->request()->all();
        $form['admin_id'] = \Auth::user()->admin_id;

        if ($model = with(new $this->model)->create($form)) {
            return $this->success('添加成功', $model);
        }

        return $this->error('添加失败');
    }

}