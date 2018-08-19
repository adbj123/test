<?php
namespace app\admin\controller;
use app\admin\model\Role;
use app\admin\model\Auth;
class RoleController extends CommonController
{
    public function add()
    {
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
}

?>

