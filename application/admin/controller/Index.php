<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

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
        echo 1;
    }

    
}
