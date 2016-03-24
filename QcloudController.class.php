<?php

namespace Admin\Controller;

/**
 * Description of QcloudController.class.php
 * 腾讯云api
 * @author static7
 */
class QcloudController extends AdminController {

    protected $bucketName = 'package';
    protected $cosApi = '';

    /*
     * cos sdk 导入
     */

    public function __construct() {
        parent::__construct();
        Vendor('Qcloud_cos.Cosapi');
        Vendor('Qcloud_cos.Conf');
        Vendor('Qcloud_cos.Auth');
        Vendor('Qcloud_cos.Http');
//        $this->cosApi = new \Cosapi();//Qcloud_cos文件夹下的文件“没有”命名空间 请使用这个实例化
        $this->cosApi = new \Vendor\Qcloud_cos\Cosapi(); //Qcloud_cos文件夹下的文件“存在”命名空间 请使用这个实例化
        $this->cosApi->setTimeout(60); //设置超时时间
    }

    /*
     * cos列表
     * @author staitc7
     */

    public function index() {
        $listRet = $this->cosApi->listFolder($this->bucketName, "/");
        var_dump($listRet['data']);
    }

    /*
     * 创建目录或者删除目录
     * @param string $directory 目录名字
     * @author staitc7
     */

    public function createFolder($directory = null) {
        empty($directory) && $this->error('文件目录名称不能为空');
        $createFolderRet = $this->cosApi->createFolder($this->bucketName, $directory);
        if ($createFolderRet['code'] === 0) {
            $this->index();
        } else {
            dump($createFolderRet);
        }
    }

    /*
     * 删除文件或者文件夹
     * @param string $directory 要删除的文件夹
     * 如果目录中存在有效文件或目录，将不能删除。
     * @author staitc7
     */

    public function delFolder($directory = 'null') {
        empty($directory) && $this->error('文件目录名称不能为空');
        $delRet=  $this->cosApi->delFolder($this->bucketName, $directory);
         if ($delRet['code'] === 0) {
            $this->index();
        } else {
            dump($delRet);
        }
    }
        

}
