<?php
/**
 * @author vision.shi@yunzhihui.com
 * Date: 2015-11-19 11:58
 */

namespace App\Http\Controllers;


class TestController extends Controller
{


    public function index()
    {
        dd(csrf_token());
        return 'index';
    }

    public function destroy(){
        return 'destroy';
    }
}