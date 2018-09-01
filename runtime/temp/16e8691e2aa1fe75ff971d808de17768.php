<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"G:\TP\public/../application/admin\view\role\upd.html";i:1535021739;}*/ ?>
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
        .box th, .box td{border: 1px solid #ccc;}
        .box b{color:blue;}
        li{list-style: none;}
        .box .ul_f{float:left;}
        .box .son{padding-left: 10px;}
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
        <span class="active">基本信息<?php echo $qwer; ?></span>
    </div>
    <form action="" method="post">
        <input type="hidden" name="role_id" value="<?php echo $roleData['role_id']; ?>">
        <ul class="forminfo">
            <li>
                <label>角色名称</label>
                <input name="role_name" placeholder="请输入权限名称" type="text" class="dfinput" value="<?php echo $roleData['role_name']; ?>" /><i></i>
            </li>
            <li>
                分配权限：
                <table width="600px" border="1px" rules="all" class="box">
                    <!--循环一级（即pid=0）-->
                    <?php foreach($children[0] as $one): ?>
                    <tr>
                        <th><input name="auth_ids_list[]" type="checkbox" onclick="select_all(this)" value='<?php echo $one; ?>' name="ids[]"><?php echo $auths[$one]['auth_name']?></th>
                        <td>
                            <!--循环二级-->
                            <?php foreach($children[$one] as $two): ?>
                            <ul class="ul_f">
                                <b><input name="auth_ids_list[]" onclick="select_all(this);select_up(this,'<?php echo $one; ?>')" value='<?php echo $two; ?>' type="checkbox" name="ids[]"><?php echo $auths[ $two ]['auth_name']; ?></b>
                                <ul>
                                    <!-- 循环三级 -->
                                    <?php  foreach($children[ $two ] as $three): ?>
                                    <li class="son"><input name="auth_ids_list[]" onclick='select_up(this,"<?php echo $one .','.$two; ?>")' value="<?php echo $three; ?>" type="checkbox"  name="ids[]"><?php echo $auths[ $three]['auth_name']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </ul>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>

        <li>
            <label>&nbsp;</label>
            <input name="" id="btnSubmit" type="submit" class="btn" value="确认保存" />
        </li>
        </ul>
    </form>
</div>
</body>
<script>
    //让当前角色已有的权限默认选中
    var auth_ids_list = "<?php echo $roleData['auth_ids_list']; ?>";
    var ids_arr = auth_ids_list.split(',');
    //alert(ids_arr);
    $("input[type='checkbox']").val(ids_arr);
    //权限全选和全不选
    function select_all(ele){
        //ele 是dom对象
        //ele.checked：获取元素选中的状态 true=>选中  false=>未选中
        $(ele).parent().next().find('input').attr('checked',ele.checked);
    }


    //选中父元素
    function select_up(ele,ids){
        // ids为'2'或'3,5'   => [2]   [3,5]

        //$(ele).parents('tr').children('th').find('input').attr('checked',true); //选中状态
        var arr = ids.split(','); // [3,5]
        for(var i=0; i<arr.length; i++){
            //把复选框value等于指定的值默认选中
            $("input[type='checkbox'][value="+arr[i]+"]").attr('checked',true);
        }

    }
</script>

</html>
