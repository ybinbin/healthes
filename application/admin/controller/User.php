<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Loader;
use think\Db;
use think\Url;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $map = '';
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $map = "(username like '%$search%' OR truename like '%$search%')";
            $value['search'] = $search;
        }
        $admins = Loader::model('Admin')->actionList([], $map, true, 'id DESC');
        
        $value = [
            'admins' => $admins['data'] ?? null,
            'page' => $admins['page'],
            'totalpage' => $admins['totalpage'] ?? '',
            'search' => $search ?? '',
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
        $re = Loader::model('Admin')->renew();
        return $this->success('添加成功',Url::build('/admin/user/index'));
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
        $admins = Loader::model('Admin')->find($id);

        $this->view->metaTitle = '编辑管理员';
        $this->view->action = 'user';

        return $this->view->assign(['member'=>$admins])->fetch('create');
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
        $re = Loader::model('Admin')->renew();
        return $this->success('编辑成功',Url::build('/admin/user/index'));
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $re = Loader::model('Admin')->setStatus(['id' => $id], ['status' => '-1']);

        return $this->success('删除成功',Url::build('/admin/user/index'));
    }

    public function changeStatus()
    {
        $status = $_POST['status']==1 ? 2 : 1;
        $re = Loader::model('Admin')->setStatus(['id' => $_POST['id']], ['status' => $status]);

        return json_encode(array('status' => 1, 'msg' => '操作成功'));
    }
}
