<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;

use App\Model\Assembly;
use DB;

class AssemblyController extends Controller
{
    protected $viewPrefix = 'assembly';

    public function index()
    {
		return $this->view('');
    }

	public function getHdlist(){

		$pageSize = $this->request()->get('pageSize',6);
		$assembly =Assembly::orderBy('updated_at')->paginate($pageSize);

		return $this->view('hdlist')->with('assemblys',$assembly);
	}

	public function hddetail(Assembly $assembly){
		return $this->view('hddetail')->with('assembly',$assembly);
	}
}