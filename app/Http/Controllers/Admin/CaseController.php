<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-08 22:17
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ResourceTrait;

class CaseController extends Controller
{


    use ResourceTrait;

    protected $viewPrefix = 'admin.case';

    protected $model      = 'App\Model\Scase';


}