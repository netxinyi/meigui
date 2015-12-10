<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
#Option模型
use App\Model\Option;


class OptionController extends Controller
{


    /**
     * 模板前缀
     * @var string
     */
    protected $viewPrefix = 'admin.option';


    /**
     * Option管理首页
     * @return mixed
     */
    public function getBase()
    {

        //查询所有Options
        $options = [];


        Option::all(['key', 'value'])->each(function ($option) use (&$options) {

            $options[$option->key] = $option->value;
        });

        //响应一个模板
        return $this->view('index', ['options' => $options]);

    }

  
    public function getRecommend()
    {
        return $this->view('recommend');
    }

    public function getFlash()
    {
         //查询所有Options
        $options = [];


        Option::all(['key', 'value'])->each(function ($option) use (&$options) {

            $options[$option->key] = $option->value;
        });

        return $this->view('flash',['options' => $options]);
    }

    public function getWechat()
    {
        return $this->view('wechat');
    }

    // 基本设置更新
     public function postUpdatebase()
    {

        $this->validate($this->request(), [
            'site_name' => 'required|max:255',
            // 'site_url' => 'url',

        ], [
            'site_name.required' => '请填写网站名称',
            'site_name.max' => '网站名称最长不能超过255个字符',
            // 'site_url.url' => '网站地址格式不正确'
        ]);

        $options = $this->request()->only(['site_name', 'site_url', 'site_icp', 'site_keywords', 'site_description','tel','qq1','qq2']);

        try {
            transaction();
            foreach ($options as $key => $option) {
                Option::where('key', $key)->update(['value' => $option]);
            }

            commit();

            return $this->success('保存成功');
        } catch (\Exception $exception) {
            rollback();

        }

        return $this->error('修改失败,请稍后再试');

    }

    // 更新轮播图信息
     public function postLunbo()
    {

        $options = $this->request()->only(['lb_image1', 'lb_url1', 'lb_title1', 'lb_image2', 'lb_url2','lb_title2','lb_image3','lb_url3','lb_title3']);

        try {
            transaction();
            foreach ($options as $key => $option) {
                Option::where('key', $key)->update(['value' => $option]);
            }

            commit();

            return $this->success('保存成功');
        } catch (\Exception $exception) {
            rollback();

        }

        return $this->error('修改失败,请稍后再试');

    }

    //上传广告图片
    public function postImage()
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

                 
               $targetDir = 'uploads/images';
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

    

}