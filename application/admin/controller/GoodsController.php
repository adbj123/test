<?php
    namespace app\admin\controller;
    use app\admin\model\Category;
    use app\admin\model\Goods;
    use app\admin\model\Type;
    use app\admin\model\Attribute;

    class GoodsController extends CommonController{
        public function add(){
            if(request()->isPost()){
                //2.接收post参数
                $postData = input('post.');
                //3.验证器验证
//                $result = $this->validate($postData,"Goods.add",[],true);
//                if($result!==true){
//                    $this->error( implode(',',$result) );
//                }
                //4.写入数据库
                $goodsModel = new Goods();
                //处理文件上传
                $goods_img = $goodsModel->uploadImg();
                //上传成功，把路径存储到数据库
                if($goods_img){
                    $postData['goods_img'] = json_encode($goods_img);
                }
                if($goodsModel->save($postData)){
                    $this->success('入库成功',url('/admin/goods/index'));
                }else{
                    $this->error('入库失败');
                }
            }
            //取出无极限分类的数据
            $catModel = new Category();
            $oldCats = $catModel->select();
            $cats = $catModel->getSonsCat($oldCats);
            //取出商品属性分类
            $types = Type::select();
            return $this->fetch('',[
                'cats' => $cats,'types'=>$types
            ]);
        }
    }
?>
