<?php
namespace app\admin\model;
use think\Model;
class Category extends Model
{
    protected $pk = "cat_id";
    protected $autoWriteTimestamp = true;

    public function getSonsCat($data,$pid=0,$level=1){
        static $result = [];
        foreach ($data as $k=>$v){
            if($v['pid'] == $pid){
                $v['level']=$level;
                $result[$v['cat_id']] = $v;
                //移除已经判断过的元素
                unset($data[$k]);
                //递归调用
                $this->getSonsCat($data,$v['cat_id'],$level+1);
            }
        }
        return $result;
    }
}
?>
