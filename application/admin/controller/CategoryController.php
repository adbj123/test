<?php
namespace app\admin\controller;
use app\admin\model\Category;
//use app\admin\model\Type;

class CategoryController extends CommonController
{
    public function add(){
        if(request()->isPost()){
            $postData = input('post.');
            $result = $this->validate($postData,'Category.add',[],true);
            if($result !== true){
                $this->error(implode(',',$result));
            }
            $categoryModel = new Category();
            if($categoryModel->save($postData)){
                $this->success("添加成功",url("/admin/category/index"));
            }else{
                $this->error("添加失败");
            }
        }
        //取出无限极分类的数据
        $catModel = new Category();
        $oldCats = $catModel->select()->toArray();
        $cats = $catModel->getSonsCat($oldCats);
        return $this->fetch('',['cats'=>$cats]);
    }
    public function index(){
        $catModel = new Category();
        $oldCats = $catModel->select()->toArray();
        $cats = $catModel->getSonsCat($oldCats);
        return $this->fetch('',['cats'=>$cats]);
    }
    public function upd(){
        if(request()->isPost()){
            $postData = input('post.');
            $result = $this->validate($postData,'Category.add',[],true);
            if($result !== true){
                $this->error(implode(',',$result));
            }
            $categoryModel = new Category();
            if($categoryModel->save($postData)){
                $this->success("修改成功",url("/admin/category/index"));
            }else{
                $this->error("修改失败");
            }
        }
        //取出无限极分类的数据
        $catModel = new Category();
        $oldCats = $catModel->select()->toArray();
        $cats = $catModel->getSonsCat($oldCats);
        //取出数据回显
        $cat_id = input('cat_id');
        $catData = Category::find($cat_id)->toArray();
        //halt($catData);
        return $this->fetch('',['cats'=>$cats,'catData'=>$catData]);
    }
}
?>
