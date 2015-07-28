<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-08 22:18
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;

trait ResourceTrait
{


    /**
     * 显示资源首页-列表页
     * @return mixed
     */
    public function index()
    {

        return $this->view('index')->with('models', with(new $this->model)->paginate(15));


    }


    /**
     * 创建资源页面
     * @return mixed
     */
    public function create()
    {

        return $this->view('create');
    }


    /**
     * 执行创建资源操作
     * @return mixed
     */
    public function store()
    {

        //验证表单
        $this->validateStore();

        $form = $this->request()->all();

        if ($model = with(new $this->model)->create($form)) {
            return $this->success('添加成功', $model);
        }

        return $this->error('添加失败');

    }


    /**
     * 执行更新操作
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return mixed
     */
    public function update(Model $model)
    {

        $this->validateUpdate();
        $form = $this->request()->all();


        if ($model->update($form)) {
            return $this->success('保存成功', $model);
        }

        return $this->error('修改失败，请稍后再试');
    }


    /**
     * 执行创建资源时的验证器
     */
    protected function validateStore()
    {

    }


    /**
     * 执行更新资源时的验证器
     */
    protected function validateUpdate()
    {

    }


    /**
     * 删除资源
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Model $model)
    {

        if ($model->delete()) {
            return $this->success('删除成功');
        }

        return $this->error('删除失败');
    }


    /**
     * 编辑资源
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return mixed
     */
    public function edit(Model $model)
    {

        return $this->view('edit')->withModel($model);

    }
}