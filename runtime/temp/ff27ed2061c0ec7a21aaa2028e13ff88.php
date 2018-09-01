<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"G:\TP\public/../application/admin\view\category\upd.html";i:1534938006;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="<?php echo config('static_admin'); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="<?php echo config('static_admin'); ?>/js/jquery.js"></script>
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
            <li><a href="#">权限设置</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle">
            <span class="active">基本信息</span>

        </div>
        <form action="" method="post">
            <input type="hidden" name="cat_id" value="<?php echo $catData['cat_id']; ?>">
            <ul class="forminfo">
                <li>
                    <label>分类名称名称</label>
                    <input name="cat_name" placeholder="请输入权限名称" type="text" class="dfinput" value="<?php echo $catData['cat_name']; ?>"/><i></i>
                </li>
                <li>
                    <label>父分类</label>
                    <select name="pid" class="dfinput">
                        <option value="">请选择父类</option>
                        <option value="0">顶级权限</option>
                        <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): if( count($cats)==0 ) : echo "" ;else: foreach($cats as $key=>$v): ?>
                            <option value="<?php echo $v['cat_id']; ?>"><?php echo str_repeat('--- ',$v['level']); ?><?php echo $v['cat_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </li>
                <li>
                    <label>导航栏</label>
                    <input type="radio" name="is_show" value="0">不显示
                    <input type="radio" name="is_show" value="1">显示
                </li>
			<li>
                    <label></label>
                    <input name="" id="btnSubmit" type="submit" class="btn" value="确认添加" />
             </li>
            </ul>
        </form>
    </div>
</body>
<script>

    var is_show = "<?php echo $catData['is_show']; ?>";
    $("select[name='pid']").val("<?php echo $catData['pid']; ?>");
    $("input[name='is_show'][value="+is_show+"]").attr('checked',true);
</script>

</html>
