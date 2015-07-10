<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-10 23:01
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Comment;

class CommentController extends Controller
{


    use ResourceTrait;

    /**
     * 模板目录前缀
     * @var string
     */
    protected $viewPrefix = 'admin.comment';


    /**
     * 评论模型
     * @var
     */
    protected $model = Comment::class;


    /**
     * 显示评论列表页
     * @return $this
     */
    public function index()
    {

        $models = Comment::all(['comment_id', 'content', 'user_id', 'article_id', 'created_at']);
        $models->load(['user', 'article']);

        return $this->view('index')->with('models', $models);
    }

}