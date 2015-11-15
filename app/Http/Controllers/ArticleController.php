<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;


use App\Model\Article;

class ArticleController extends Controller
{
    protected $viewPrefix = 'article';

    public function index(Article $article)
    {
        return $this->view('index');
    }
}