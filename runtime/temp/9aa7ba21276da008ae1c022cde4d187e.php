<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"G:\TP\public/../application/admin\view\user\index.html";i:1534605350;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="<?php echo config('static_admin'); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo config('static_admin'); ?>/css/page.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo config('static_admin'); ?>/js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".click").click(function() {
            $(".tip").fadeIn(200);
        });

        $(".tiptop a").click(function() {
            $(".tip").fadeOut(200);
        });

        $(".sure").click(function() {
            $(".tip").fadeOut(100);
        });

        $(".cancel").click(function() {
            $(".tip").fadeOut(100);
        });

    });
    </script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">用户管理页</a></li>
            <li><a href="#">用户列表</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <div class="tools">
            <ul class="toolbar">
                <li><span><img src="<?php echo config('static_admin'); ?>/images/t01.png" /></span>添加</li>
                <li><span><img src="<?php echo config('static_admin'); ?>/images/t02.png" /></span>修改</li>
                <li><span><img src="<?php echo config('static_admin'); ?>/images/t03.png" /></span>删除</li>
                <li><span><img src="<?php echo config('static_admin'); ?>/images/t04.png" /></span>统计</li>
            </ul>
        </div>
        <table class="tablelist">
            <thead>
                <tr>
                    <th>
                        <input name="" type="checkbox" value="" id="checkAll" />
                    </th>
                    <th>序号</th>
                    <th>用户名</th>
                    <th>创建时间</th>
                    <th>修改</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($usersData) || $usersData instanceof \think\Collection || $usersData instanceof \think\Paginator): if( count($usersData)==0 ) : echo "" ;else: foreach($usersData as $key=>$v): ?>
                <tr>
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v['username']; ?></td>
                    <td><?php echo $v['create_time']; ?></td>
                    <td><?php echo $v['update_time']; ?></td>
                    <td><a href="<?php echo url('/admin/user/upd',['user_id'=>$v['user_id']]); ?>" class="tablelink">修改</a> <a href="<?php echo url('/admin/user/del',['user_id'=>$v['user_id']]); ?>" onclick="return confirm('确认删除？')" class="tablelink"> 删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="pagination">
                <?php echo $usersData->render(); ?>
        </div>
        <div class="tip">
            <div class="tiptop"><span>提示信息</span>
                <a></a>
            </div>
            <div class="tipinfo">
                <span><img src="<?php echo config('static_admin'); ?>/images/ticon.png" /></span>
                <div class="tipright">
                    <p>是否确认对信息的修改 ？</p>
                    <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
                </div>
            </div>
            <div class="tipbtn">
                <input name="" type="button" class="sure" value="确定" />&nbsp;
                <input name="" type="button" class="cancel" value="取消" />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>

</html>
