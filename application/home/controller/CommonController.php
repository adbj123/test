<?php
namespace app\home\controller;
use think\Controller;
use app\home\model\Category;

class CommonController extends Controller{
    public function _initialize(){
        /****************首页导航栏*****************/
        $catModel = new Category();
        $navCats=$catModel->getNavCats(6);

        /****************首页三级分类筛选*****************/
        $oldCats = $catModel->select()->toArray();
        $cats=[];
        foreach ($oldCats as $v){
            $cats[$v['cat_id']]=$v;
        }
        $children = [];
        foreach ($oldCats as $v){
            $children[$v['pid']][]=$v['cat_id'];
        }
        return $this->fetch('',[
            'navCats'=>$navCats,
            'cats'=>$cats,
            'children'=>$children,
        ]);
    }
}