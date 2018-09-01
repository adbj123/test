<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Goods extends Model{
    protected $pk = 'goods_id';
    protected $autoWriteTimestamp = true;

    public static function init(){
        //入库前事件
        Goods::event('before_insert',function($goods){
            //生成货号
            $goods['goods_sn'] = date("ymdHis").time().uniqid();
        });

//        入库后事件
        Goods::event("after_insert",function($goods){
            $goods_id = $goods['goods_id'];
            $postData = input('post.');
            //获取商品属性值和价格
            $goodsAttrValue = $postData['goodsAttrValue'];
            $goodsAttrPrice = $postData['goodsAttrPrice'];
            //需要循环入库到商品属性表sh_goods_attr
            foreach ($goodsAttrValue as $attr_id =>$attrs_value){
                //如果$attrs_value是数组则是单选属性
                if(is_array($attrs_value)){
                    //单选属性
                    foreach ($attrs_value as $k =>$single_attr_value){
                        $data = [
                            'goods_id'  => $goods_id,
                            'attr_id'   =>  $attr_id,
                            'attr_value' => $single_attr_value,
                            'attr_price' => $goodsAttrPrice[$attr_id][$k],
                            'create_time' => time(),
                            'update_time' => time(),
                        ];
                        Db::name("goods_attr")->insert($data);
                    }
                }else{
                    //唯一属性
                    $data = [
                        'goods_id' => $goods_id,
                        'attr_id'  => $attr_id,
                        'attr_value' => $attrs_value,
                        'create_time' => time(),
                        'update_time' => time(),
                    ];
                    Db::name("goods_attr")->insert($data);
                }
            }
        });
    }
    public function uploadImg(){
        //用于存储图片路径信息
        $goods_img=[];
        //1.接收上传文件的信息
        $files = request()->file('img');
        //2.判断是否有文件上传
        if($files){
            //3.因为是多文件，因此循环取出file对象进行上传
            $upload_dir = "./uploads/";
            $validate = [
                'size'=>1024*1024*3,
                'ext'=>'jpg,png,gif,jpeg'
            ];
            foreach ($files as $file){
                $uploadInfo = $file->validate($validate)->move($upload_dir);
                if($uploadInfo){
                    //获取文件的路径信息存储到$goods_img中
                    //将\替换成/
                   $goods_img[] = str_replace('\\','/',$uploadInfo->getSaveName());
                }
            }
            return $goods_img;
        }
        //没有文件
        return $goods_img;

    }
    public function genThumb($goods_img){
        //存储中图路径
        $goods_middle = [];
        //存储小图路径
        $goods_thumb = [];
        /**
         * 1.打开需要处理的图片
         * 2.对图片进行重命名
         * 3.对图片进行缩放处理
         * 4.保存图片路径
         */

        foreach ($goods_img as $path){
            $path_arr = explode('/',$path);
            $image = \think\Image::open('./uploads/'.$path);
            $thumb_path = $path_arr[0].'/middle_'.$path_arr[1];
            $image->thumb(350,350,2)->save('./uploads/'.$thumb_path);
            $goods_middle[] = $thumb_path;
        }
        foreach ($goods_img as $path){
            $path_arr = explode('/',$path);
            $image = \think\Image::open('./uploads/'.$path);
            $thumb_path = $path_arr[0].'/small_'.$path_arr[1];
            $image->thumb(50,50,2)->save('./uploads/'.$thumb_path);
            $goods_thumb[] = $thumb_path;
        }
        return ['goods_middle'=>$goods_middle,'goods_thumb'=>$goods_thumb];
    }

}