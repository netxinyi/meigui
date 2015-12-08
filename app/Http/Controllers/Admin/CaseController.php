<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-08 22:17
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Scase;

class CaseController extends Controller
{


    protected $viewPrefix = 'admin.case';


    public function index()
    {
		$case = Scase::all();
        return $this->view('index')->with('case',$case);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Scase $scase)
    {
		$this->validate($this->request(),$rules = array(
			'title'   => 'required|max:255',
			'photos'   => 'required',
		), $message = [
			'title.required'  => '请填写标题',
			'title.max'       => '标题太长',
			'photos.required' =>'最少上传一张图片'
		], $customAttributes = [

		]);
        $form = $this->request()->all();
		$form['cover'] = $form['photos']['0'];
        $form['photos'] = implode('\n',$form['photos']);
		if(Scase::create($form)){
			return $this->success('添加成功', $scase);
		}
    }

	//图片上传
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
                'url' => '/uploads/case/'.$name
            )
        );
    }
}