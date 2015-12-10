<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;


use App\Model\Scase;
use App\Enum\Scase as scaseEnum;

class ScaseController extends Controller
{
    protected $viewPrefix = 'scase';

    public function index(Scase $scase)
    {
		return $this->view();
    }

	public function getYylist(){
		$scase = Scase::where('publish_type','=',scaseEnum::PUBLISH_YUANYANGPU)->get();
		return $this->view('yuanyanglist')->with('case',$scase);
	}

	public function yydetail(Scase $scase){
		$scase['photos'] = explode("\n",$scase['photos']);
		return $this->view('yuanyang')->with('case',$scase);
	}
}