<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;


use App\Model\Article;
use App\Model\Column;

class ArticleController extends Controller
{
    protected $viewPrefix = 'article';

    public function index(Article $article)
    {
		$lanmus = Column::with('articles')->get();
		return $this->view('index')->with('lanmus',$lanmus)->with('art',$article);
    }
}