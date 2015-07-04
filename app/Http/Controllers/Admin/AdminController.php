<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-04 19:59
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Enum\Admin as AdminEnum;

class AdminController extends Controller
{


    protected $viewPrefix = 'admin.admin';


    /**
     * 显示管理员列表界面
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return $this->view('index');
    }


    /**
     * 显示编辑管理员界面
     *
     * @param \App\Model\Admin $admin
     *
     * @return $this
     */
    public function edit(Admin $admin)
    {

        return $this->view('edit')->with('admin', $admin);
    }


    /**
     * 执行更新管理员操作
     * @param \App\Model\Admin $admin
     *
     * @return $this|\App\Http\Controllers\Controller|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function update(Admin $admin)
    {


        $this->validate([
            'admin_name'         => 'required|min:5|max:15|unique:admins,admin_name,' . $admin->admin_id . ',admin_id',
            'email'              => 'required|email|unique:admins,email,' . $admin->admin_id . ',admin_id',
            'admin_status'       => 'required|in:' . implode(',', array_keys(AdminEnum::$statusForm)),
            'admin_role'         => 'required|in:' . implode(',', array_keys(AdminEnum::$rolesForm)),
            'admin_pass'         => 'min:5|max:20',
            'admin_pass_confirm' => 'required_with:admin_pass|same:admin_pass'
        ]);

        $form = $this->request()->only(['admin_name', 'admin_role', 'email', 'admin_status']);

        if ($admin_pass = $this->request()->get('admin_pass')) {
            $form['admin_pass'] = $admin_pass;
        }

        if ($admin->update($form)) {
            return $this->success('保存成功', $admin);
        }

        return $this->error('修改失败，请稍后再试');

    }


    /**
     * 显示添加管理员界面
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return $this->view('create');
    }


    public function store()
    {

        //验证表单
        $this->validate([
            'admin_name'         => 'required|min:5|max:15|unique:admins',
            'email'              => 'required|email|unique:admins',
            'admin_status'       => 'required|in:' . implode(',', array_keys(AdminEnum::$statusForm)),
            'admin_role'         => 'required|in:' . implode(',', array_keys(AdminEnum::$rolesForm)),
            'admin_pass'         => 'required|min:5|max:20',
            'admin_pass_confirm' => 'required|required_with:admin_pass|same:admin_pass'
        ]);

        $form = $this->request()->only(['admin_name', 'admin_role', 'email', 'admin_status', 'admin_pass']);

        if ($admin = Admin::create($form)) {
            return $this->success('添加管理员成功', $admin);
        }

        return $this->error('添加管理员失败');

    }
}