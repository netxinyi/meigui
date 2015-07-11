<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 08:58
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\GuestBook;

class GuestbookController extends Controller
{


    use ResourceTrait;

    /**
     * 模板目录前缀
     * @var string
     */
    protected $viewPrefix = 'admin.guestbook';

    /**
     * 留言板模型
     * @var
     */
    protected $model = GuestBook::class;


}