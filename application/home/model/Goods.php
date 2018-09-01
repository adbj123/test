<?php
namespace app\home\model;
use think\Model;
class Goods extends Model
{
    //商品浏览历史
    public function addGoodsToHistory($goods_id){
        //由于浏览历史之前可能已经有数据，要先取出来，否则设置成空数组
        $history = cookie('history')?cookie('history'):[];
        if($history){
            //有历史数据,从头部开始加入到数组
            array_unshift($history,$goods_id);
            //移除数组重复的元素
            $history = array_filter(array_unique($history,$goods_id));

            //限制数量为5，删除数组的尾部元素
            if(count($history)>5) {
                array_pop($history);
                }
            }else{
                //无浏览历史
                $history[]=$goods_id;
            }
            //再次把浏览历史写入到cookie,保存一个星期
            cookie('history',$history,3600*24*7);
            return $history;
        }
}
?>
