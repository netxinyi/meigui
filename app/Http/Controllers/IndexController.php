<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 14:56
 */

namespace App\Http\Controllers;


use App\Model\User;

class IndexController extends Controller
{

    public function getIndex()
    {
        $selects = array('user_id', 'user_name', 'avatar', 'sex', 'birthday');
        $limit = 12;
        $users['male'] = User::male()->recommended()->orderBy('recommended_order', 'asc')->limit($limit)->get($selects);
        $users['female'] = User::female()->recommended()->orderBy('recommended_order', 'asc')->limit($limit)->get($selects);

        return $this->view('home')->with('users', $users);
    }

    public function getSearch()
    {
        return $this->view('search');
    }
}