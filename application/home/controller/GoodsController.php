<?php
    namespace app\home\controller;
    use app\home\model\Goods;
    use app\home\model\Category;
    use think\Db;

    class GoodsController extends CommonController{

        public function detail(){
            $goods_id = input('goods_id');
            //halt($goods_id);
            $goods = Goods::find($goods_id)->toArray();
            //获取商品面包屑导航
            $catModel = new Category();
            $oldCats = $catModel->select();
            $familyCat = $catModel->getFamilyCat($oldCats,$goods['cat_id']);

            //把图片的json格式变为数组格式
            $goods['goods_img'] = json_decode($goods['goods_img']);
            $goods['goods_middle'] = json_decode($goods['goods_middle']);
            $goods['goods_thumb'] = json_decode($goods['goods_thumb']);

            //取出商品的单选属性
            $old_single_attr = Db::name('goods_attr')
                    ->field('t1.*,t2.attr_name')
                    ->alias('t1')
                    ->join('sh_attribute t2','t1.attr_id = t2.attr_id','left')
                    ->where('goods_id','=',$goods_id)
                    ->where('attr_type','=',1)
                    ->select();

            //通过单选属性的attr_id进行分组
            $single_attr = [];
            foreach ($old_single_attr as $v){
                $single_attr[$v['attr_id']][] = $v;
            }

            //取出商品的唯一属性
            $only_attr = Db::name('goods_attr')
                ->field('t1.*,t2.attr_name')
                ->alias('t1')
                ->join('sh_attribute t2','t1.attr_id = t2.attr_id','left')
                ->where('goods_id','=',$goods_id)
                ->where('attr_type','=',0)
                ->select();

            /*****************************记录商品的浏览历史***********************/
            $goodsModel = new Goods();
            $history = $goodsModel->addGoodsToHistory($goods_id);
            //查询出浏览历史中的商品
            $where = [
                'is_sale'=>1,
                'is_delete'=>0,
                'goods_id'=>['in',$history]
            ];
            $history_str = implode(',',$history);
            //halt($history_str);

            //新数据库函数field,按照数组顺序查询出数据
            $historyData = $goodsModel->where($where)->order("field(goods_id,$history_str)")->select()->toArray();
//            $cart = new \cart\Cart();

            return $this->fetch('',[
                'goods'=>$goods,
                'familyCat'=>$familyCat,
                'single_attr'=>$single_attr,
                'only_attr'=>$only_attr,
                'historyData'=>$historyData,
            ]);
        }
        /***************加入到购物车****************/
        public function addGoodsToCart(){
            if(request()->isAjax()){
                //判断是否登陆
                if(!session('member_id')){
                    $response = ['code'=>-1,'message'=>'请先登录'];
                    echo json_encode($response);die();
                }
                $goods_id = input('goods_id');
                $goods_attr_ids = input('goods_attr_ids');
                $goods_number = input('goods_number');
                //通过购物车方法加入到购物车
                $cart = new \cart\Cart();
                $result = $cart->addCart($goods_id,$goods_attr_ids,$goods_number);
                if($result){
                    $response = ['code'=>200,'message'=>'成功加入到购物车'];
                    echo json_encode($response);die();
                }else{
                    $response = ['code'=>-2,'message'=>'加入购物车失败'];
                    echo json_encode($response);die();
                }
            }
        }
    }
?>