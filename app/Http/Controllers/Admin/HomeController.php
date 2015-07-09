<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-09 22:32
 */

namespace App\Http\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Option;

class HomeController extends Controller
{


    protected $viewPrefix = 'admin.home';


    //后台首页
    public function index()
    {

        $visit = Option::get();


        return $this->view('index');

    }
}