<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"G:\TP\public/../application/admin\view\auth\upd.html";i:1534682973;}*/ ?>
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
            <input type="hidden" name="auth_id" value="<?php echo $authData['auth_id']; ?>">
            <ul class="forminfo">
                <li>
                    <label>权限名称</label>
                    <input name="auth_name" placeholder="请输入权限名称" value="<?php echo $authData['auth_name']; ?>" type="text" class="dfinput" /><i></i>
                </li>
                <li>
                    <label>父级权限</label>
                    <select name="pid" class="dfinput">
                        <option value="">请选择父级权限</option>
                        <option value="0">顶级权限</option>
                        <?php if(is_array($auths) || $auths instanceof \think\Collection || $auths instanceof \think\Paginator): if( count($auths)==0 ) : echo "" ;else: foreach($auths as $key=>$v): ?>
                            <option value="<?php echo $v['auth_id']; ?>"><?php echo str_repeat('--- ',$v['level']); ?><?php echo $v['auth_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </li>
                <li>
                    <label>控制器名</label>
                    <input name="auth_c" value="<?php echo $authData['auth_c']; ?>" placeholder="请输入控制器名" type="text" class="dfinput" />
                </li>
                <li>
                    <label>方法名</label>
                    <input name="auth_a" value="<?php echo $authData['auth_a']; ?>" placeholder="请输入方法名" type="text" class="dfinput" />
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
    $('select[name="pid"]').val("<?php echo $authData['pid']; ?>")
    //切换父级权限的change事件
    $("select[name='pid']").change(function () {
        var pid = $(this).val();
        if(pid == 0){
            //切换了顶级，把方法名和控制器元素禁用，值，清空
            $("input[name='auth_c'],input[name='auth_a']").attr('disabled',true).val('');
        }else{
            //非顶级，input可用
            $("input[name='auth_c'],input[name='auth_a']").attr('disabled',false).val('');
        }
    })
</script>

</html>
