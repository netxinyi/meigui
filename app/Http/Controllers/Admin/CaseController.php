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


    protected $viewPrefix = 'admin.case';


    public function index()
    {
        return $this->view('index');
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store()
    {
        $form = $this->request()->all();
        dd($form);
    }

    public function postImage()
    {
        $image = $this->request()->file('image');

        $name = md5($image->getClientOriginalName() . rand(100, 99999)) . '.' . $image->getClientOriginalExtension();
        $file = $image->move(public_path('/') . 'uploads/case', $name);

        return array(
            'image' => array(
                'name' => $name,
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
                'url' => url('/uploads/case/' . $name)
            )
        );
    }
}