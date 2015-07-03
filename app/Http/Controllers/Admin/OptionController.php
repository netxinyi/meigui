<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Http\Controllers\Admin;

#继承Controller
use App\Http\Controllers\Controller;
#Option模型
use App\Model\Option;

class OptionController extends Controller
{


    /**
     * 模板前缀
     * @var string
     */
    protected $viewPrefix = 'admin.option';


    /**
     * Option管理首页
     * @return mixed
     */
    public function index()
    {

        //查询所有Options
        $options = Option::all();

        //响应一个模板
        return $this->view('index', ['options' => $options]);

    }


}