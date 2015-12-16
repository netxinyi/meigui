<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 18:40
 */

namespace App\Http\Controllers;

use App\Model\Assembly;
use App\Enum\Assembly as EnumAssembly;

class AssemblyController extends Controller
{
    protected $viewPrefix = 'assembly';

    public function index(Assembly $assembly)
    {
		$lanmus = Assembly::where('index_status','=',EnumAssembly::DISPLAY_BLOCK)->orderBy('created_at','desc')->get();
		return $this->view('index')->with('assembly',$assembly)->with('lanmus',$lanmus);
    }
}