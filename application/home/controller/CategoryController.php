<?php
    namespace app\home\controller;
    use app\home\model\Category;
    use app\home\model\Goods;
    class CategoryController extends CommonController{
        public function index(){
            /************************面包屑导航*****************************/
            //接收分类参数
            $cat_id = input('cat_id');
            //取出所有分类
            $catModel = new Category();
            $oldCats = $catModel->select()->toArray();
            //获取当前分类的祖先分类
            $familyCat = $catModel->getFamilyCat($oldCats,$cat_id);

            /************************分类折叠菜单*****************************/
            //技巧一
            $cats = [];
            foreach ($oldCats as $v){
                $cats[$v['cat_id']] = $v;
            }
            //技巧二
            $children = [];
            foreach ($oldCats as $v){
                $children[$v['pid']][] = $v['cat_id'];
            }
            /************************递归找子孙分类商品*****************************/
            //获取当前分类的子孙分类
            $sonsCat = $catModel->getSonsCat($oldCats,$cat_id='1');

            $sonsCat[]=(int)$cat_id;
            $where = [
              'is_sale'=>1,
              'is_delete'=>0,
              'cat_id'=>['in',$sonsCat],
            ];
            $goodsData = Goods::where($where)->select()->toArray();

            return $this->fetch('',[
                'familyCat'=>$familyCat,
                'cats'=>$cats,
                'children'=>$children,
                'goodsData'=>$goodsData
            ]);
        }
    }
?>