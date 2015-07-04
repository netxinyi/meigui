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


    public function index()
    {

        return $this->view('index');
    }


    public function edit(Admin $admin)
    {

        return $this->view('edit')->with('admin', $admin);
    }


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
}