<?php
    namespace app\admin\model;
    use think\Model;
    class Auth extends Model
    {
        protected $pk = "auth_id";
        protected $autoWriteTimestamp = true;

        public function getSonsAuth($data,$pid=0,$level=1){
            static $result = [];
            foreach ($data as $v){
                if($v['pid'] == $pid){
                    $v['level']=$level;
                    $result[]=$v;
                    $this->getSonsAuth($data,$v['auth_id'],$level+1);
                }
            }
            return $result;

        }
        public static function init(){
            //编辑前事件
            Auth::event('before_update',function($auth){
                //当顶级pid=0,清除控制器和方法名
                if($auth['pid'] == 0){
                    $auth['auth_c'] = '';
                    $auth['auth_a'] = '';
                }
            });
        }

    }
?>
