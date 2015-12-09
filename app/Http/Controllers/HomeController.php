<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;

use App\Model\User;
use App\Http\Controllers\Session;

class HomeController extends Controller
{

    protected $viewPrefix = 'home';

    public function getIndex()
    {
        return $this->view('index');
    }

    public function getXiangxi()
    {
        return $this->view('xiangxi');
    }

    public function getAvatar()
    {
        return $this->view('avatar');
    }

    public function getGallery()
    {
        return $this->view('gallery');

    }

    public function getZeou()
    {
        return $this->view('zeou');

    }

    public function getJieshao()
    {
        return $this->view('jieshao');

    }

    // 保存基本信息
     public function postUpdate()
    {
        //接收数据
        $data = $this->request()->only('user_name','height','education','marriage','salary');

          $this->validate($this->request(), array(
            'user_name' => 'required',
        ), array(
            'user_name.required' => '昵称不能为空！',
        ));

        user()->update($data);
        return $this->rest()->success('修改成功！');

    }


     // 保存详细信息
     public function postXiangxi()
    {
         //接收数据
        $info_data = $this->request()->only('card','stock','qq','email','origin_province','origin_city');
        $user_data = $this->request()->only('mobile');

        $this->validate($this->request(), $rules= array(
            'mobile' => 'required|digits:11|exists:users',
            'qq' => 'numeric',
            'email' => 'email',
        ), array(
            'mobile.required' => '手机号码不能为空',
            'mobile.digits' => '手机号码是11位',
            'qq.numeric' => 'QQ格式有误',
            'email.email' => '邮箱格式有误',
        ));

        user()->info()->update($info_data);
        user()->update($user_data);
        return $this->rest()->success('修改成功！');

    }

     // 保存自我介绍信息
     public function postJieshao()
    {
         //接收数据
        $data = $this->request()->only('introduce');

        $this->validate($this->request(), $rules= array(
            'introduce' => 'required',
          
        ), array(
            'introduce.required' => '自我介绍内容不能为空',
          
        ));

        user()->info()->update($data);
        return $this->rest()->success('修改成功！');

    }

     // 保存择偶条件
     public function postZeou()
    {

         //接收数据
        $data = $this->request()->only('age_start','age_end','marriage','house','origin_province','origin_city','education','children','salary_start','salary_end','height_start','height_end');

        user()->object()->update($data);
        return $this->rest()->success('修改成功！');

    }


    public function postPhoto()
    {
        // Make sure file is not cached (as it happens for example on iOS devices)
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");

                /*
                  // Support CORS
                  header("Access-Control-Allow-Origin: *");
                  // other CORS headers if any...
                  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
                  exit; // finish preflight CORS requests here
                  }
                 */

                // 5 minutes execution time
                @set_time_limit(5 * 60);

                //$targetDir = '/uploads/user_pic'; //5.1调用

                 
               $targetDir = 'uploads/avatar';
                $cleanupTargetDir = true; // Remove old files
                $maxFileAge = 5 * 3600; // Temp file age in seconds    
                // echo "<script>alert(111);</script>";
                // Create target dir
                //判断是不是有这么一个目录，如果没有，那就递归创建这个目录
                // dd($targetDir);
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);chmod($targetDir,0777);
                }

                // Get a file name
                if (isset($_REQUEST["name"])) {

                    $fileName = $_REQUEST["name"];
                } elseif (!empty($_FILES)) {
                    $fileName = $_FILES["file"]["name"];
                } else {
                    $fileName = uniqid("file_");
                }
                // dd($fileName);

               
                $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

                // Chunking might be enabled
                $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
                $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


                // Remove old temp files  
                if ($cleanupTargetDir) {

                    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory(未能打开临时目录)."}, "id" : "id"}');
                    }

                    while (($file = readdir($dir)) !== false) {
                        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                        // If temp file is current file proceed to the next
                        if ($tmpfilePath == "{$filePath}.part") {
                            continue;
                        }

                        // Remove temp file if it is older than the max age and is not the current file
                        if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                            @unlink($tmpfilePath);
                        }
                    }
                    closedir($dir);
                }


                // Open temp file
                if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                }

                if (!empty($_FILES)) {
                    if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
                    }

                    // Read binary input stream and append it to temp file
                    if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    }
                } else {
                    if (!$in = @fopen("php://input", "rb")) {
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    }
                }

                while ($buff = fread($in, 4096)) {
                    fwrite($out, $buff);
                }


                @fclose($out);
                @fclose($in);

                // Check if file has been uploaded
                if (!$chunks || $chunk == $chunks - 1) {
                    // Strip the temp .part suffix off 
                    rename("{$filePath}.part", $filePath);
                }
                // Return Success JSON-RPC response
                //处理要存入数据库的路径
                // $filePath = strchr($filePath,"answer");
                if (strpos($filePath, 'uploads')) {

                    $filePath = strchr($filePath, "/uploads");

                }
                $filePath = substr($filePath,15);
              
                return $filePath;
                //            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

    }


    public function postTouxiang(){
         //接收数据
       
        $data = $this->request()->only('avatar');
        user()->update($data);

        return $this->rest()->success('保存成功');

    }

}