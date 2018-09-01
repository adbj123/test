<?php
namespace app\admin\controller;
use app\admin\model\Attribute;
use app\admin\model\Category;
use app\admin\model\Type;

class AttributeController extends CommonController
{
    public function add()
    {
        //接收提交数据
        if(request()->isPost()){
            $postData = input('post.');
            if($postData['attr_input_type']==1){
                //列表选择
                $result = $this->validate($postData,'Attribute.add',[],true);
            }else{
                //手工选择
                $result = $this->validate($postData,'Attribute.exceptAttrValues',[],true);
            }

            if($result !== true){
                $this->error( implode(',',$result) );
            }
            $attributeModel = new Attribute();
            if($attributeModel->save($postData)){
                $this->success('入库成功',url('/admin/attribute/index'));
            }else{
                $this->error('入库失败');
            }
        };

        $types = Type::select();
        return $this->fetch('',['types'=>$types]);
    }
    public function index(){
        //select t1.*,t2.type_name from sh_attribute t1 left join sh_type t2 on t1.type_id = t2.type_id
        $attrsData = Attribute::alias('t1')
            ->field('t1.*,t2.type_name')
            ->join('sh_type t2','t1.type_id = t2.type_id','left')
            ->select();
        return $this->fetch('',['attrsData'=>$attrsData]);
    }
    public function upd(){
        //接收提交数据
        if(request()->isPost()){
            $postData = input('post.');
            if($postData['attr_input_type']==1){
                //列表选择
                $result = $this->validate($postData,'Attribute.add',[],true);
            }else{
                //手工选择
                $result = $this->validate($postData,'Attribute.exceptAttrValues',[],true);
            }
            if($result !== true){
                $this->error( implode(',',$result) );
            }
            $attributeModel = new Attribute();
            if($attributeModel->update($postData)){
                $this->success('入库成功',url('/admin/attribute/index'));
            }else{
                $this->error('入库失败');
            }
        }
        $attr_id = input('attr_id');
        $attrData = Attribute::find($attr_id)->toArray();
        $types = Type::select();
        //halt($types);
        //halt($attrData);
        return $this->fetch('',
            ['types'=>$types,
            'attrData'=>$attrData]
        );
    }
    public function del(){
        $attr_id = input('attr_id');
        if(Attribute::destroy($attr_id)){
            $this->success('删除成功',url('/admin/attribute/index'));
        }else{
            $this->error('删除失败');
        }

    }
}
    ?>
