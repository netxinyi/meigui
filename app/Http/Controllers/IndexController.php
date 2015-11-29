<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 14:56
 */

namespace App\Http\Controllers;


use App\Model\User;
use App\Model\UserRecommend;

class IndexController extends Controller
{

    public function getIndex()
    {

        $recommends = UserRecommend::with(array(
            'user' => function ($query) {
                //只需要正常状态的会员
                return $query->status();
            }
        ))->index()->orderBy('order')->get()->all();
        $users = array();
        foreach ($recommends as $recommend) {

            $users = array_merge($users, $recommend->user->all());
        }

        return $this->view('index')->with('users', $users);
    }

    public function getSearch()
    {
        return $this->view('search');
    }
}