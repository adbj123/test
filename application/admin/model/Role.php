<?php
namespace app\admin\model;
use think\Model;
class Role extends Model
{
    protected $pk = "role_id";
    protected $autoWriteTimestamp = true;

    //入库前事件
    public static function init(){
        //入库前事件
        Role::event('before_insert',function($role){
            $role['auth_ids_list'] = implode(',',$role['auth_ids_list']);
        });

        //更新前事件
        Role::event('before_update',function($role){
            $role['auth_ids_list'] = implode(',',$role['auth_ids_list']);
        });
    }

}

?>
