<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class Index extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        $this->view->metaTitle = 'logo管理';
        $this->view->action = 'index';

        return $this->view->fetch('index');
    }

    /**
     * 设置logo
     *
     * @return \think\Response
     */
    public function logoSet()
    {
        $info = Db::name('logo')->where(['id'=>1])->find();
        
        $this->view->metaTitle = 'logo管理';
        $this->view->action = 'index';

        return $this->view->assign('logo', $info)->fetch('logoset');
    }

    public function logoSave()
    {
        $data = $_POST;
        $data['addtime'] = time();
        $data['logo'] = $data['logo'] ? $data['logo'] : $data['old_logo'];
        unset($data['old_logo']);
        // print_r($data);exit;

        $re = Db::name('logo')->where(['id'=>1])->update($data);
        var_dump($re);
    }

    
}
