<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;

use App\Model\Pastevents;

class PasteventsController extends Controller
{
    protected $viewPrefix = 'pastevents';

    public function index()
    {
		return $this->view('');
    }

	public function getHdlist(){

		$pageSize = $this->request()->get('pageSize',7);
		$pastevents =Pastevents::orderBy('updated_at')->paginate($pageSize);

		return $this->view('hdlist')->with('pastevents',$pastevents);
	}

	public function hddetail(Pastevents $pastevents){
		return $this->view('hddetail')->with('pastevents',$pastevents);
	}
}