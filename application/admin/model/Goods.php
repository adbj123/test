<?php
namespace app\admin\model;
use think\Model;

class Goods extends Model{
    protected $pk = 'goods_id';
    protected $autoWriteTimestamp = true;

    public static function init(){
        //入库前事件
        Goods::event('before_insert',function($goods){
            //生成货号
            $goods['goods_sn'] = date("ymdHis").time().uniqid();
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
    public function genThimb($goods_img){
        //存储中图路径
        $goods_middle = [];
        //存储小图路径
        $goods_thumb = [];
        /**
         * 1.打开需要处理的图片
         * 2.对图片进行重命名
         * 3对图片进行缩放处理
         * 4.保存图片路径
         */
    }
}