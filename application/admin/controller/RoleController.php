<?php
namespace app\admin\controller;
use app\admin\model\Role;
use app\admin\model\Auth;
use think\Db;

class RoleController extends CommonController
{
    public function add()
    {
        /**
         * 1.判断是否是post提交
         * 2.接受post数据
         * 3.验证
         * 4.入库
         */
        if(request()->isPost()){

            $postData = input('post.');

            $result = $this->validate($postData,'Role.add',[],true);
            if($result !== true){
                $this->error(implode(',',$result));
            }

            $roleModel = new Role();
            if($roleModel->save($postData)){
                $this->success('入库成功',url('/admin/role/index'));
            }else{
                $this->error('入库失败');
            }
        }

        $oldAuths = Auth::select()->toArray();
        //技巧1
        //遍历$oldAuths二维数组，以每个元素的auth_id作为其下标
        $auths = [];
        foreach ($oldAuths as $v){
            $auths[$v['auth_id']] = $v;
        }
        //技巧2
        //遍历$oldAuths二维数组，通过pid的值进行分组
        $children = [];
        foreach ($oldAuths as $v){
            $children[$v['pid']][] = $v['auth_id'];
        }
        return $this->fetch('',[
            'children' => $children,
            'auths' => $auths,
        ]);
    }
    public function index(){
        $sql = "select t1.*,group_concat(t2.auth_name) as all_auth from sh_role t1 left join sh_auth t2 on find_in_set(t2.auth_id,t1.auth_ids_list) group by t1.role_id";
        $rolesData = Db::query($sql);
        //halt($rolesData);
        return $this->fetch('',['rolesData'=>$rolesData]);
    }
    public function upd(){
        if(request()->isPost()){
            $postData = input('post.');
            //halt($postData);
            $result = $this->validate($postData,'Role.upd',[],true);
            if($result !== true){
                $this->error(implode(',',$result));
            }

            $roleModel = new Role();
            if($roleModel->update($postData)){
                $this->success('编辑成功',url('/admin/role/index'));
            }else{
                $this->error("编辑失败");
            }
        }
        //回显
        $role_id = input('role_id');
        $roleData = Role::find($role_id);
        $oldAuths = Auth::select()->toArray();
        //技巧1
        //遍历$oldAuths二维数组，以每个元素的auth_id作为其下标
        $auths = [];
        foreach ($oldAuths as $v){
            $auths[$v['auth_id']] = $v;
        }
        //技巧2
        //遍历$oldAuths二维数组，通过pid的值进行分组
        $children = [];
        foreach ($oldAuths as $v){
            $children[$v['pid']][] = $v['auth_id'];
        }
        return $this->fetch('',[
            'children' => $children,
            'auths' => $auths,
            'roleData' => $roleData,
        ]);

    }
    public function del(){
        $role_id = input('role_id');
        //halt($role_id);
        if(Role::destroy($role_id)){
            $this->success('删除成功',url('/admin/role/index'));
        }else{
            $this->error('删除失败');
        }
    }

}

?>

