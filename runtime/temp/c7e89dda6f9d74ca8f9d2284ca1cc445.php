<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"G:\TP\public/../application/admin\view\type\add.html";i:1534840585;}*/ ?>
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
        <li><a href="#">商品类型</a></li>
    </ul>
</div>
<div class="formbody">
    <div class="formtitle">
        <span class="active">基本信息</span>

    </div>
    <form action="" method="post">

        <ul class="forminfo">
            <li>
                <label>商品类型名称</label>
                <input name="type_name" placeholder="请输入用户名" type="text" class="dfinput" /><i></i>
            </li>
            <li>
                <label>备注</label>
                <textarea name="mark" class="textinput"> </textarea>
            </li>
            <li>
                <label>&nbsp;</label>
                <input name="" id="btnSubmit" type="submit" class="btn" value="确认添加" />
            </li>
    </form>
</div>
</body>
<script>
    $(".formtitle span").click(function(event){
        $(this).addClass('active').siblings("span").removeClass('active') ;
        var index = $(this).index();
        $("ul.forminfo").eq(index).show().siblings(".forminfo").hide();
    });
    $(".formtitle span").eq(0).click();
</script>

</html>
