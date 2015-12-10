<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;


use App\Model\Scase;

class ScaseController extends Controller
{
    protected $viewPrefix = 'scase';

    public function index(Scase $scase)
    {
		return $this->view();
    }

	public function yydetail(Scase $scase){
		return $this->view('yuanyang');
	}
}