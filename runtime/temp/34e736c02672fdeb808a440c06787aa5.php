<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"G:\TP\public/../application/admin\view\goods\add.html";i:1535079749;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="<?php echo config('static_admin'); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="<?php echo config('static_admin'); ?>/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
    <style>
        .active{
            border-bottom: solid 3px #66c9f3;
        }
    </style>
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">表单</a></li>
    </ul>
</div>
<div class="formbody">
    <div class="formtitle">
        <span class="active">基本信息</span>
        <span>商品属性信息</span>
        <span>商品相册</span>
        <span>商品描述</span>

    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <ul class="forminfo">
            <li>
                <label>商品名称</label>
                <input name="goods_name" placeholder="请输入商品名称" type="text" class="dfinput" /><i></i>
            </li>
            <li>
                <label>商品分类</label>
                <select name='cat_id' class="dfinput">
                    <option value=''>请选择一个分类</option>
                    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): if( count($cats)==0 ) : echo "" ;else: foreach($cats as $key=>$v): ?>
                    <option value="<?php echo $v['cat_id']; ?>"><?php echo str_repeat('---',$v['level']); ?><?php echo $v['cat_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </li>
            <li>
                <label>商品价格</label>
                <input name="goods_price" placeholder="请输入商品价格" type="text" class="dfinput" /><i></i>
            </li>
            <li>
                <label>商品库存</label>
                <input name="goods_number" placeholder="请输入商品库存" type="text" class="dfinput" />
            </li>
            <li>
                <label>回收站</label>
                <cite>
                    <input name="is_delete" type="radio" value="0" checked="checked" />否&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_delete" type="radio" value="1" />是
                </cite>
            </li>
            <li>
                <label>上架</label>
                <cite>
                    <input name="is_sale" type="radio" value="0"  />否&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_sale" type="radio" value="1" checked="checked" />是
                </cite>
            </li>
            <li>
                <label>新品</label>
                <cite>
                    <input name="is_new" type="radio" value="0"  />否&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_new" type="radio" value="1" checked="checked" />是
                </cite>
            </li>
            <li>
                <label>精品</label>
                <cite>
                    <input name="is_best" type="radio" value="0"  />否&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_best" type="radio" value="1" checked="checked" />是
                </cite>
            </li>
        </ul>

        <ul class="forminfo">
            <li>
                <label>商品类型</label>
                <select name="type_id" class="dfinput">
                    <option value="">请选择类型</option>
                    <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): if( count($types)==0 ) : echo "" ;else: foreach($types as $key=>$v): ?>
                    <option value="<?php echo $v['type_id']; ?>"><?php echo $v['type_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </select>
                <!--存储动态生成属性的容器-->
                <li id = "attrContainer"></li>
            </li>

        </ul>
        <!--_____________________多图片上传_________________________-->
        <ul class="forminfo">
            <li>
                <a href="javascript:;" onclick="cloneImg(this)">[+]</a>&nbsp;&nbsp;<input type="file" name="img[]">
            </li>
        </ul>

        <ul class="forminfo">
            <li>
                <label>商品详情</label>
                <textarea name="goods_desc" id="goods_desc"></textarea>
            </li>
        </ul>
        <li>
            <label>&nbsp;</label>
            <input name="" id="btnSubmit" type="submit" class="btn" value="确认保存" />
        </li>
    </form>
</div>
</body>
<script>
    //切换类型属性，发送ajax,动态生成属性结构
    $("select[name='type_id']").change(function () {
        //获取当前切换的类型ID
        var type_id = $(this).val();
        //发送ajax,获取类型对应的所有属性
        var html = '';
        $.get("<?php echo url('admin/goods/getTypeAttr'); ?>",{"type_id":type_id},function (res) {
            console.log(res);
            html +="<ul>";
            //循环拼接li
            for(var i=0;i<res.length;i++){
                html +="<li>";
                //1.拼接[+]（单选属性attr_type=1）
                if(res[i].attr_type ==1){
                   html +="<a href='javascript:;' onclick='cloneAttr(this)'>[+]</a>";
                }
                //2.拼接属性的名称
                html +=res[i].attr_name+"&nbsp;&nbsp;";
                //判断是否是单选属性，name后面需要加[],唯一属性则不需要
                var harManyValue = res[i].attr_type == 1 ? '[]' : '';
                //3.判断属性值的录入方式
                if(res[i].attr_input_type == 0){
                    //手工输入
                    html +="<input type='text' class='dfinput' name='goodsAttrValue["+  res[i].attr_id+"]"+harManyValue+"' placeholder='属性值'>";
                }else{
                    //列表选择==〉select
                    var attr_values = res[i].attr_values;
                    var arr_values = attr_values.split('|');
                    html += "<select class='dfinput' name='goodsAttrValue["+res[i].attr_id+"]"+harManyValue+"'>";
                    html +="<option value=''>请选择</option>";
                    for(var j=0;j<arr_values.length;j++){
                        html +="<option value='"+arr_values[j]+"'>"+arr_values[j]+"</option>";
                    }
                    html += "</select>";
                }
                if(res[i].attr_type==1){
                    html += "&nbsp;&nbsp;属性价格：<input style='width:100px' name='goodsAttrPrice["+res[i].attr_id+"][]' placeholder='价格' type='text' class='dfinput' />";
                }
                html +="</li>";
            }

            html +="</ul>";
            //把拼接好的ul赋值给id=attrContainer
            $("#attrContainer").html(html);

        },'json');
    });
    //克隆单选属性的事件
    function cloneAttr(ele) {
        //获取a标签的内容
        var text = $(ele).html();
        if(text == '[+]'){
            //克隆当前元素父元素
            var newLi = $(ele).parent().clone();
            //把内部的[+]改为[-]
            newLi.children('a').html('[ - ]');
            newLi.children('input').val('');
            //把克隆后的newLi元素放置到当前元素的父元素后面
            $(ele).parent().after(newLi);
        }else{
            //[-]移除当前父元素
            $(ele).parent().remove();
        }
    }
    //克隆图片的事件
    function cloneImg(ele) {
        //获取a标签的内容
        var text = $(ele).html();
        if(text == '[+]'){
            //克隆当前元素父元素
            var newLi = $(ele).parent().clone();
            //把内部的[+]改为[-]
            newLi.children('a').html('[ - ]');
            newLi.children('input').val('');
            //把克隆后的newLi元素放置到当前元素的父元素后面
            $(ele).parent().after(newLi);
        }else{
            //[-]移除当前父元素
            $(ele).parent().remove();
        }
    }
    //初始化富文本编辑器
    var ue = UE.getEditor('goods_desc');
    $(".formtitle span").click(function(event){
        $(this).addClass('active').siblings("span").removeClass('active') ;
        var index = $(this).index();
        $("ul.forminfo").eq(index).show().siblings(".forminfo").hide();
    });
    $(".formtitle span").eq(0).click();
</script>

</html>
