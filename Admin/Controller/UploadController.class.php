<?php
namespace Open\Controller;
use Think\Controller;
use Think\Upload;
class FileController extends Controller {
    public function uplad($ftype = 'image') {
        // 划分一下允许上传的文件类型
        // * 与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。
        if ($ftype == 'image') {
            $ftype = 'jpg,gif,png,jpge,bmp';
        } else if ($ftype == 'file') {
            $ftype = 'zip,rar,doc,xls,ppt';
        }
        
        $setting = array(
            'mines'		=> '', 
            'maxSize'	=> 4 * 1024 * 1024, // 32/8 = 4 获得字节数
			'exts'		=> $ftype,
			'autoSub'	=> true, // 自动子目录存储
			'subName'=> array('date', 'Y-m-d'), // 子目录创建方式
			'rootPath'	=> __ROOT__.'/Uploads', 
			'savePath' => ''
        );
		
		/* 调用文件上传组件上传文件 */
        //实例化上传类，传入上面的配置数组
        $this->uploader = new Upload($setting, 'Local');
        $info = $this->uploader->upload($_FILES);
        //这里判断是否上传成功
        if ($info) {
            // 上传成功 获取上传文件信息
            foreach ($info as &$file) {
                //拼接出上传目录
                $file['rootpath'] = __ROOT__ . ltrim($setting['rootPath'], ".");
                //拼接出文件相对路径
                $file['filepath'] = $file['rootpath'] . $file['savepath'] . $file['savename'];
            }
            //这里可以输出一下结果,相对路径的键名是$info['upload']['filepath']
            dump($info['upload']);
            exit();
        } else {
            //输出错误信息
            exit($this->uploader->getError());
        }
    }
}