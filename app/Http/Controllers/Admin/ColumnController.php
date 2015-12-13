<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-04 23:57
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Column;

class ColumnController extends Controller
{


    use ResourceTrait;

    /**
     * 文本文件目录前缀
     * @var string
     */
    protected $viewPrefix = 'admin.column';

    /**
     * 管理模型
     * @var
     */
    protected $model = Column::class;


    public function destroy(Column $model)
    {

        if ($model->articles->count() > 0) {
            return $this->error('栏目下有文章,无法直接删除,请先删除文章');
        }
        if ($model->delete()) {
            return $this->success('删除成功');
        }

        return $this->error('删除失败');
    }

}