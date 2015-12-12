<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/10/11 19:28
 */

namespace App\Http\Controllers\Admin;


use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageCenterController extends UserController
{

    public function getIndex()
    {

    }

    public function postUeditor()
    {
        $response = $this->postUpload();

        $data = $response->getData()->data;

        $ret = array(
            'url' => $data->url,
            'state' => $data->status == UPLOAD_ERR_OK ? 'SUCCESS' : $data->status
        );
        return json_encode($ret);
    }

    public function postUpload()
    {

        try {
            $file = $this->request()->file('upfile');
            $info = $this->upload($file);


            if ($info['status'] === UPLOAD_ERR_OK) {

                return $this->rest()->success($info, '上传成功!');
            }
            return $this->rest()->error('上传失败!', $info['error'], $info);
        } catch (\Exception $ex) {
            return $this->rest()->error($ex->getMessage());
        }
    }

    public function postUploads()
    {
        try {
            $files = $this->request()->file();
            $files->getClientOriginalExtension();
            $result = array();
            foreach ($files as $name => $file) {

                $result[] = $this->upload($file);
            }
            return $this->rest()->success($result, '上传成功!');
        } catch (\Exception $ex) {
            return $this->rest()->error('上传失败!');
        }
    }


    protected function upload(UploadedFile $file)
    {

        $info = $this->checkFile($file);

        if ($info['status'] === UPLOAD_ERR_OK) {
            $path = $this->getPathName($info['type']);
            $name = $this->getFileName($file);
            $pathname = public_path('/') . $path;

            $file->move($pathname, $name);
            $info['url'] = $this->getUrl($path, $name);
        }

        return $info;
    }

    protected function checkFile(UploadedFile $file)
    {

        $mime = $file->getClientMimeType();
        $info = array(
            'name' => $file->getClientOriginalName(),
            'size' => $file->getClientSize(),
            'mime' => $mime,
            'extension' => $file->getClientOriginalExtension(),
            'type' => $mime,
            'error' => ''
        );
        if ($file->isValid()) {

            if (!$info['type']) {
                $info['status'] = 9;
                $info['error'] = '不支持的文件类型';
            } else {
                $info['status'] = UPLOAD_ERR_OK;
            }

        } else {

            $info['status'] = $file->getError();
            $info['error'] = $file->getErrorMessage();
        }
        return $info;

    }

    protected function getPathName($type = 'image')
    {
        return '/uploads/images/' . date('Ymd') . '/';
    }

    protected function getFileName(UploadedFile $file)
    {

        return '!!!' . base64_encode(md5(microtime(true) . rand(666666, 888888)));
    }

    protected function getUrl($path, $name)
    {

        return asset(str_finish($path, '/') . $name);
    }

}