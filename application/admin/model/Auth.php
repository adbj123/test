<?php
    namespace app\admin\model;
    use think\Model;
    class User extends Model
    {
        protected $pk = "user_id";
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
    }
?>
