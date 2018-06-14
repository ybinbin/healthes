<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Loader;
use think\Db;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $admins = Loader::model('Admin')->actionList([], true, 'id DESC');

        $value = [
            'admins' => $admins['data'] ?? null,
            'page' => $admins['page'],
            'totalpage' => $admins['totalpage'] ?? '',
        ];

        $this->view->metaTitle = '管理员列表';
        $this->view->action = 'user';

        return $this->view->assign($value)->fetch('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $this->view->metaTitle = '添加管理员';
        $this->view->action = 'user';

        return $this->view->fetch('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        // var_dump(Loader::model('Admin'));exit;
        $re = Loader::model('Admin')->renew();
        var_dump($re);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
