<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"G:\TP\public/../application/home\view\order\orderInfo.html";i:1535596255;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>填写核对订单信息</title>
	<link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/base.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/global.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/header.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/fillin.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/footer.css" type="text/css">

	<!--<script type="text/javascript" src="<?php echo config('static_home'); ?>/js/jquery.js"></script>-->
	<!--<script type="text/javascript" src="<?php echo config('static_home'); ?>/js/cart2.js"></script>-->
    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/jquery-1.8.3.min.js"></script>

</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京西！[<a href="login.html">登录</a>] [<a href="register.html">免费注册</a>] </li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>
	
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="<?php echo config('static_home'); ?>/images/logo.png" alt="京西商城"></a></h2>
			<div class="flow fr flow2">
				<ul>
					<li>1.我的购物车</li>
					<li class="cur">2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="fillin w990 bc mt15">
		<div class="fillin_hd">
			<h2>填写并核对订单信息</h2>
		</div>

		<div class="fillin_bd">
			<!-- 收货人信息  start-->
			<div class="address">
				<div class="address_select">
					<form action="<?php echo url('/home/order/writeOrderInfo'); ?>" method="post"  name="address_form">
						<ul>
							<li>
								<label for=""><span>*</span>收 货 人：</label>
								<input type="text" name="receiver" class="txt" />
							</li>
							<li>
								<label for=""><span>*</span>收货地址：</label>
								<input type="text" name="address" class="txt" />
							<li>
								<label for=""><span>*</span>电话：</label>
								<input type="text" name="phone" class="txt"  />
							</li>
							<li>
								<label for=""><span>*</span>邮编：</label>
								<input type="text" name="zcode" class="txt" />
							</li>
						</ul>
					</form>
					
				</div>
			</div>
			<!-- 收货人信息  end-->

			

			<!-- 商品清单 start -->
			<div class="goods">
				<h3>商品清单</h3>
				<table>
					<thead>
						<tr>
							<th class="col1">商品</th>
							<th class="col2">规格</th>
							<th class="col3">价格</th>
							<th class="col4">数量</th>
							<th class="col5">小计</th>
						</tr>	
					</thead>
					<tbody>
                    <?php $totalPrice=0;$shuliang=0; foreach($cartData as $v): ?>
                    <tr>
                        <td class="col1"><a href="<?php echo url('/home/goods/detail',['goods_id'=>$v['goods_id']]); ?>"><img src="/uploads/<?php echo json_decode($v['goodsInfo']['goods_middle'])[0]; ?>" alt="" /></a>  <strong><a href=""><?php echo $v['goodsInfo']['goods_name']; ?></a></strong></td>
                        <td class="col2"><?php echo $v['attr']['attrInfo']; ?></td>
                        <?php  $danjia=$v['goodsInfo']['goods_price']+$v['attr']['attrTotalPrice']; ?>
                        <td class="col3">￥<span><?php echo $danjia; ?></span></td>
                        <td class="col4" >
                            <?php echo $v['goods_number']; ?>
                        </td>
                        <?php
							$xiaoji = $danjia*$v['goods_number'];
							$shuliang += $v['goods_number'];
							$totalPrice += $xiaoji;
						?>
                        <td class="col5">￥<span><?php echo $xiaoji; ?></span></td>

                    </tr>
                    <?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5">
								<ul>
									<li>
										<span><?php echo $shuliang; ?>件商品，总商品金额：</span>
										<em>￥<?php echo $totalPrice ?></em>
									</li>
								</ul>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- 商品清单 end -->
		
		</div>

		<div class="fillin_ft">
			<a href="javascript:;" id="commitOrder"><span>提交订单</span></a>
			<p>应付总额：<strong>￥<?php echo $totalPrice ?>元</strong></p>
			
		</div>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt15">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="<?php echo config('static_home'); ?>/images/xin.png" alt="" /></a>
			<a href=""><img src="<?php echo config('static_home'); ?>/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="<?php echo config('static_home'); ?>/images/police.jpg" alt="" /></a>
			<a href=""><img src="<?php echo config('static_home'); ?>/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
</body>
    <script>
        $("#commitOrder").click(function() {
            //让表单提交
            $("form[name='address_form']").submit();
        });
    </script>
</html>
