<?php
    namespace app\admin\controller;
 //   use app\admin\model\Role;
    use app\admin\model\Type;
class TypeController extends CommonController
{
    public function add(){
            if(request()->isPost()){
                $postData = input('post.');

                $result = $this->validate($postData,'type.add',[],true);

                if($result !== true){
                    $this->error( implode(',',$result) );
                }

                $typeModel = new Type();
                if($typeModel->save($postData)){
                    $this->success('入库成功',url('/admin/type/index'));
                }else{
                    $this->error('入库失败');
                }
            }
            return $this->fetch('');
        }
    public function index(){
        //取出类型数据，分配到模版
        $typeData = Type::select();
        return $this->fetch('',['typesData'=>$typeData]);
    }
    public function upd(){
        if(request()->isPost()){
            $postData = input('post.');
                $result = $this->validate($postData, 'Type.upd', [], true);
                if ($result !== true) {
                    $this->error(implode(',', $result));
                }
            //写入数据库
            $typeModel = new Type();
            if($typeModel->update($postData)){
                $this->success("编辑成功",url("/admin/type/index"));
            }else{
                $this->error("编辑失败");
            }
        }
        //获取数据进行回显
        $type_id = input('type_id');
        $typeModel = new Type();
        $typeData = $typeModel->find($type_id);
        return $this->fetch('',['typeData'=>$typeData]);
    }
    public function del(){
        $type_id = input('type_id');
        if(Type::destroy($type_id)){
            $this->success('删除成功',url('/admin/type/index'));
        }else{
            $this->error('删除失败');
        }

    }
}
?>
