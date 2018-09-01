<?php
namespace app\home\model;
use think\Model;
class Category extends Model
{
    public function getNavCats($limit){
        $where = [
          'is_show'=>1,
            'pid'=>0,
        ];
        return $this->where($where)->limit($limit)->select();
    }

    //找祖先
    public function getFamilyCat($data,$cat_id){
        static $result = [];
        foreach ($data as $k=>$v){
            if($v['cat_id'] == $cat_id){
                $result[]=$v;
                unset($data[$k]);
                //递归调用
                $this->getFamilyCat($data,$v['pid']);
            }
        }
        //反转数据
        return array_reverse($result);
    }
    //找子孙
    public function getSonsCat($data,$cat_id){
        static $result = [];
        foreach ($data as $k=>$v){
            if($v['pid'] == $cat_id){
                $result[]=$v['cat_id'];
                unset($data[$k]);
                //递归调用
                $this->getFamilyCat($data,$v['cat_id']);
            }
        }
        return $result;
    }


}
?>
