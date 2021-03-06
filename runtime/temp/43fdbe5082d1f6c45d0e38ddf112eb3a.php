<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"G:\TP\public/../application/home\view\goods\detail.html";i:1535800870;s:46:"G:\TP\application\home\view\public\header.html";i:1535800723;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>京西商城</title>
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/global.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/index.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/list.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/bottomnav.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/common.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/footer.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/goods.css" type="text/css">
    <link rel="stylesheet" href="<?php echo config('static_home'); ?>/style/jqzoom.css" type="text/css">

    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/header.js"></script>
    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/index.js"></script>
    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/list.js"></script>
    <script type="text/javascript" src="/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/goods.js"></script>
    <script type="text/javascript" src="<?php echo config('static_home'); ?>/js/jqzoom-core.js"></script>
</head>
<body>
<!-- 顶部导航 start -->
<div class="topnav">
    <div class="topnav_bd w1210 bc">
        <div class="topnav_left">

        </div>
        <div class="topnav_right fr">
            <ul>
                <li>您好，<span style="color:red"><?php echo session('member_username'); ?></span>欢迎来到京西！
                    <?php if(session('member_id')):?>
                        [<a href="<?php echo url('/home/public/logout'); ?>" onclick="return confirm('确认退出？')" target="_parent">退出</a>]
                    <?php else:?>
                        [<a href="<?php echo url('/home/public/login'); ?>">登录</a>]
                                                                      [<a href="<?php echo url('/home/public/register'); ?>">免费注册</a>]
                    <?php endif;?>
                </li>
                <li class="line">|</li>
                <li><a href="<?php echo url('home/order/selfOrder'); ?>">我的订单</a></li>
                <li class="line">|</li>
                <li>客户服务</li>

            </ul>
        </div>
    </div>
</div>
<!-- 顶部导航 end -->

<div style="clear:both;"></div>

<!-- 头部 start -->
<div class="header w1210 bc mt15">
    <!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
    <div class="logo w1210">
        <h1 class="fl"><a href="<?php echo config('static_home'); ?>/index.html"><img src="<?php echo config('static_home'); ?>/images/logo.png" alt="京西商城"></a></h1>
        <!-- 头部搜索 start -->
        <div class="search fl">
            <div class="search_form">
                <div class="form_left fl"></div>
                <form action="" name="serarch" method="get" class="fl">
                    <input type="text" class="txt" value="请输入商品关键字" /><input type="submit" class="btn" value="搜索" />
                </form>
                <div class="form_right fl"></div>
            </div>

            <div style="clear:both;"></div>

            <div class="hot_search">
                <strong>热门搜索:</strong>
                <a href="<?php echo config('static_home'); ?>/">D-Link无线路由</a>
                <a href="<?php echo config('static_home'); ?>/">休闲男鞋</a>
                <a href="<?php echo config('static_home'); ?>/">TCL空调</a>
                <a href="<?php echo config('static_home'); ?>/">耐克篮球鞋</a>
            </div>
        </div>
        <!-- 头部搜索 end -->

        <!-- 用户中心 start-->
        <div class="user fl">
            <dl>
                <dt>
                    <em></em>
                    <a href="<?php echo config('static_home'); ?>/">用户中心</a>
                    <b></b>
                </dt>
                <dd>
                    <div class="prompt">
                        您好，请<a href="<?php echo config('static_home'); ?>/">登录</a>
                    </div>
                    <div class="uclist mt10">
                        <ul class="list1 fl">
                            <li><a href="<?php echo config('static_home'); ?>/">用户信息></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/">我的订单></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/">收货地址></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/">我的收藏></a></li>
                        </ul>

                        <ul class="fl">
                            <li><a href="<?php echo config('static_home'); ?>/">我的留言></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/">我的红包></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/">我的评论></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/">资金管理></a></li>
                        </ul>

                    </div>
                    <div style="clear:both;"></div>
                    <div class="viewlist mt10">
                        <h3>最近浏览的商品：</h3>
                        <ul>
                            <li><a href="<?php echo config('static_home'); ?>/"><img src="<?php echo config('static_home'); ?>/images/view_list1.jpg" alt="" /></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/"><img src="<?php echo config('static_home'); ?>/images/view_list2.jpg" alt="" /></a></li>
                            <li><a href="<?php echo config('static_home'); ?>/"><img src="<?php echo config('static_home'); ?>/images/view_list3.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </dd>
            </dl>
        </div>
        <!-- 用户中心 end-->

        <!-- 购物车 start -->
        <div class="cart fl">
            <dl>
                <dt>
                    <a href="<?php echo config('static_home'); ?>/">去购物车结算</a>
                    <b></b>
                </dt>
                <dd>
                    <div class="prompt">
                        购物车中还没有商品，赶紧选购吧！
                    </div>
                </dd>
            </dl>
        </div>
        <!-- 购物车 end -->
    </div>
    <!-- 头部上半部分 end -->

    <div style="clear:both;"></div>

    <!-- 导航条部分 start -->
    <div class="nav w1210 bc mt10">
        <!--  商品分类部分 start-->
        <div class="category fl"> <!-- 非首页，需要添加cat1类 -->
            <div class="cat_hd">  <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
                <h2>全部商品分类</h2>
                <em></em>
            </div>

            <div class="cat_bd">
                <?php if(is_array($children[0]) || $children[0] instanceof \think\Collection || $children[0] instanceof \think\Paginator): if( count($children[0])==0 ) : echo "" ;else: foreach($children[0] as $key=>$one): ?>
                <div class="cat item1">
                    <h3><a href="<?php echo url('/home/category/index',['cat_id'=>$one]); ?>"><?php echo $cats[$one]['cat_name']; ?></a> <b></b></h3>
                    <div class="cat_detail">
                        <?php if(is_array($children[$one]) || $children[$one] instanceof \think\Collection || $children[$one] instanceof \think\Paginator): if( count($children[$one])==0 ) : echo "" ;else: foreach($children[$one] as $key=>$two): ?>
                        <dl class="dl_1st">
                            <dt><a href="<?php echo url('/home/category/index',['cat_id'=>$two]); ?>"><?php echo $cats[$two]['cat_name']; ?></a></dt>
                            <dd>
                                <?php if(is_array($children[ $two ]) || $children[ $two ] instanceof \think\Collection || $children[ $two ] instanceof \think\Paginator): if( count($children[ $two ])==0 ) : echo "" ;else: foreach($children[ $two ] as $key=>$three): ?>
                                <a href="<?php echo url('/home/category/index',['cat_id'=>$three]); ?>"><?php echo $cats[ $three ]['cat_name']; ?></a>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </dd>
                        </dl>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
        <!--  商品分类部分 end-->

        <div class="navitems fl">
            <ul class="fl">
                <li class="current"><a href="<?php echo url('/'); ?>">首页</a></li>
                <?php if(is_array($navCats) || $navCats instanceof \think\Collection || $navCats instanceof \think\Paginator): if( count($navCats)==0 ) : echo "" ;else: foreach($navCats as $key=>$navCat): ?>
                <li><a href="<?php echo config('static_home'); ?>/"><?php echo $navCat['cat_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="right_corner fl"></div>
        </div>
    </div>
    <!-- 导航条部分 end -->
</div>
<!-- 头部 end-->
	<!-- 头部 end-->

	<div style="clear:both;"></div>


	<!-- 商品页面主体 start -->
	<div class="main w1210 mt10 bc">
		<!-- 面包屑导航 start -->
		<div class="breadcrumb">
			<h2>当前位置：<a href="">首页</a>
                <?php if(is_array($familyCat) || $familyCat instanceof \think\Collection || $familyCat instanceof \think\Paginator): if( count($familyCat)==0 ) : echo "" ;else: foreach($familyCat as $key=>$v): ?>
                ><a href="<?php echo url('/home/category/index',['cat_id'=>['cat_id']]); ?>"><?php echo $v['cat_name']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                > <?php echo $goods['goods_name']; ?>
            </h2>
		</div>
		<!-- 面包屑导航 end -->
		
		<!-- 主体页面左侧内容 start -->
		<div class="goods_left fl">
			<!-- 相关分类 start -->
			<div class="related_cat leftbar mt10">
				<h2><strong>相关分类</strong></h2>
				<div class="leftbar_wrap">
					<ul>
						<li><a href="">笔记本</a></li>
						<li><a href="">超极本</a></li>
						<li><a href="">平板电脑</a></li>
					</ul>
				</div>
			</div>
			<!-- 相关分类 end -->

			<!-- 相关品牌 start -->
			<div class="related_cat	leftbar mt10">
				<h2><strong>同类品牌</strong></h2>
				<div class="leftbar_wrap">
					<ul>
						<li><a href="">D-Link</a></li>
						<li><a href="">戴尔</a></li>
						<li><a href="">惠普</a></li>
						<li><a href="">苹果</a></li>
						<li><a href="">华硕</a></li>
						<li><a href="">宏基</a></li>
						<li><a href="">神舟</a></li>
					</ul>
				</div>
			</div>
			<!-- 相关品牌 end -->

			<!-- 热销排行 start -->
			<div class="hotgoods leftbar mt10">
				<h2><strong>热销排行榜</strong></h2>
				<div class="leftbar_wrap">
					<ul>
						<li></li>
					</ul>
				</div>
			</div>
			<!-- 热销排行 end -->


			<!-- 浏览过该商品的人还浏览了  start 注：因为和list页面newgoods样式相同，故加入了该class -->
			<div class="related_view newgoods leftbar mt10">
				<h2><strong>浏览了该商品的用户还浏览了</strong></h2>
				<div class="leftbar_wrap">
					<ul>
						<li>
							<dl>
								<dt><a href=""><img src="<?php echo config('static_home'); ?>/images/relate_view1.jpg" alt="" /></a></dt>
								<dd><a href="">ThinkPad E431(62771A7) 14英寸笔记本电脑 (i5-3230 4G 1TB 2G独显 蓝牙 win8)</a></dd>
								<dd><strong>￥5199.00</strong></dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt><a href=""><img src="<?php echo config('static_home'); ?>/images/relate_view2.jpg" alt="" /></a></dt>
								<dd><a href="">ThinkPad X230i(2306-3V9） 12.5英寸笔记本电脑 （i3-3120M 4GB 500GB 7200转 蓝牙 摄像头 Win8）</a></dd>
								<dd><strong>￥5199.00</strong></dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt><a href=""><img src="<?php echo config('static_home'); ?>/images/relate_view3.jpg" alt="" /></a></dt>
								<dd><a href="">T联想（Lenovo） Yoga13 II-Pro 13.3英寸超极本 （i5-4200U 4G 128G固态硬盘 摄像头 蓝牙 Win8）晧月银</a></dd>
								<dd><strong>￥7999.00</strong></dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt><a href=""><img src="<?php echo config('static_home'); ?>/images/relate_view4.jpg" alt="" /></a></dt>
								<dd><a href="">联想（Lenovo） Y510p 15.6英寸笔记本电脑（i5-4200M 4G 1T 2G独显 摄像头 DVD刻录 Win8）黑色</a></dd>
								<dd><strong>￥6199.00</strong></dd>
							</dl>
						</li>

						<li class="last">
							<dl>
								<dt><a href=""><img src="<?php echo config('static_home'); ?>/images/relate_view5.jpg" alt="" /></a></dt>
								<dd><a href="">ThinkPad E530c(33662D0) 15.6英寸笔记本电脑 （i5-3210M 4G 500G NV610M 1G独显 摄像头 Win8）</a></dd>
								<dd><strong>￥4399.00</strong></dd>
							</dl>
						</li>					
					</ul>
				</div>
			</div>
			<!-- 浏览过该商品的人还浏览了  end -->

			<!-- 最近浏览 start -->
			<div class="viewd leftbar mt10">
				<h2><a href="">清空</a><strong>最近浏览过的商品</strong></h2>
				<div class="leftbar_wrap">
                    <?php foreach($historyData as $v): ?>
					<dl>
						<dt><a href="<?php echo url('/home/goods/detail',['goods_id'=>$v['goods_id']]); ?>"><img src="/uploads/<?php echo json_decode($v['goods_thumb'])[0]; ?>" alt="" /></a></dt>
						<dd><a href=""><?php echo $v['goods_name']; ?></a></dd>
					</dl>
                    <?php endforeach; ?>
				</div>
			</div>
			<!-- 最近浏览 end -->

		</div>
		<!-- 主体页面左侧内容 end -->
		
		<!-- 商品信息内容 start -->
		<div class="goods_content fl mt10 ml10">
			<!-- 商品概要信息 start -->
			<div class="summary">
				<h3><strong><?php echo $goods['goods_name']; ?></strong></h3>
				
				<!-- 图片预览区域 start -->
				<div class="preview fl">
					<div class="midpic">
						<a href="/uploads/<?php echo $goods['goods_img'][0]; ?>" class="jqzoom" rel="gal1">   <!-- 第一幅图片的大图 class 和 rel属性不能更改 -->
							<img src="/uploads/<?php echo $goods['goods_middle'][0]; ?>" alt="" />               <!-- 第一幅图片的中图 -->
						</a>
					</div>
	
					<!--使用说明：此处的预览图效果有三种类型的图片，大图，中图，和小图，取得图片之后，分配到模板的时候，把第一幅图片分配到 上面的midpic 中，其中大图分配到 a 标签的href属性，中图分配到 img 的src上。 下面的smallpic 则表示小图区域，格式固定，在 a 标签的 rel属性中，分别指定了中图（smallimage）和大图（largeimage），img标签则显示小图，按此格式循环生成即可，但在第一个li上，要加上cur类，同时在第一个li 的a标签中，添加类 zoomThumbActive  -->

					<div class="smallpic">
						<a href="javascript:;" id="backward" class="off"></a>
						<a href="javascript:;" id="forward" class="on"></a>
						<div class="smallpic_wrap">
							<ul>
                                <?php foreach($goods['goods_middle'] as $k=>$v): ?>
								<li <?php echo $k==0?'class="cur"':''; ?>>
									<a <?php echo $k==0?'class="zoomThumbActive"':''; ?> href="javascript:void(0);" rel="{gallery: 'gal1', smallimage: '<?php echo '/uploads/'.$v; ?>',largeimage: '<?php echo '/uploads/'.$goods['goods_img'][$k]; ?>'}"><img src="<?php echo '/uploads/'.$goods['goods_thumb'][$k]; ?>"></a>
								</li>
                                <?php endforeach; ?>
							</ul>
						</div>
						
					</div>
				</div>
				<!-- 图片预览区域 end -->

				<!-- 商品基本信息区域 start -->
				<div class="goodsinfo fl ml10">
					<ul>
						<li><span>商品编号： </span><?php echo $goods['goods_sn']; ?></li>
						<li class="market_price"><span>定价：</span><em>￥<?php echo $goods['goods_price']*1.2; ?></em></li>
						<li class="shop_price"><span>本店价：</span> <strong>￥<?php echo $goods['goods_price']; ?></strong> <a href="">(降价通知)</a></li>
						<li><span>上架时间：</span><?php echo $goods['create_time']; ?></li>
						<li class="star"><span>商品评分：</span> <strong></strong><a href="">(已有21人评价)</a></li> <!-- 此处的星级切换css即可 默认为5星 star4 表示4星 star3 表示3星 star2表示2星 star1表示1星 -->
					</ul>
					<form action="" method="post" class="choose">
						<ul>
                            <!--循环单选属性数据-->
                            <?php foreach($single_attr as $attr):?>
							<li class="product">
								<dl>
									<dt><?php echo $attr[0]['attr_name']; ?></dt>
									<dd>
                                        <!--循环属性值-->
                                        <?php foreach($attr as $k=>$v):?>
										<a <?php echo $k==0? 'class="selected"' :'';?> href="javascript:;"><?php echo $v['attr_value'] ?>
                                        <input type="radio" name="color" value="<?php echo $v['goods_attr_id']; ?>" checked="checked" /></a>
                                        <?php endforeach; ?>
									</dd>
								</dl>
							</li>
                            <?php endforeach; ?>
							
							<li>
								<dl>
									<dt>购买数量：</dt>
									<dd>
										<a href="javascript:;" id="reduce_num"></a>
										<input type="text" name="amount" value="1" class="amount"/>
										<a href="javascript:;" id="add_num"></a>
									</dd>
								</dl>
							</li>

							<li>
								<dl>
									<dt>&nbsp;</dt>
									<dd>
										<input type="button" goods_id="<?php echo $goods['goods_id']; ?>" id="add_cart" value="" class="add_btn" />
									</dd>
								</dl>
							</li>

						</ul>
					</form>
				</div>
				<!-- 商品基本信息区域 end -->
			</div>
			<!-- 商品概要信息 end -->
			
			<div style="clear:both;"></div>

			<!-- 商品详情 start -->
			<div class="detail">
				<div class="detail_hd">
					<ul>
						<li class="first on"><span>商品介绍</span></li>
						<!-- <li class="on"><span>商品评价</span></li> -->
						<li><span>售后保障</span></li>
					</ul>
				</div>
				<div class="detail_bd">
					<!-- 商品介绍 start -->
					<div class="introduce detail_div ">
						<div class="attr mt15">
							<ul>
                                <?php if(is_array($only_attr) || $only_attr instanceof \think\Collection || $only_attr instanceof \think\Paginator): if( count($only_attr)==0 ) : echo "" ;else: foreach($only_attr as $key=>$v): ?>
								<li><span><?php echo $v['attr_name']; ?>：</span><?php echo $v['attr_value']; ?></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>

						<div class="desc mt10">
							<!-- 此处的内容 一般是通过在线编辑器添加保存到数据库，然后直接从数据库中读出 -->
							<?php echo $goods['goods_desc']; ?>
						</div>
					</div>

					<div class="after_sale mt15 none detail_div">
						<div>
							<p>本产品全国联保，享受三包服务，质保期为：一年质保 <br />如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！</p>
							<p>售后服务电话：800-898-9006 <br />品牌官方网站：http://www.lenovo.com.cn/</p>

						</div>

						<div>
							<h3>服务承诺：</h3>
							<p>本商城向您保证所售商品均为正品行货，京东自营商品自带机打发票，与商品一起寄送。凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由本商城联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。本商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！</p> 
							
							<p>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>

						</div>
						
						<div>
							<h3>权利声明：</h3>
							<p>本商城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东商城重要的经营资源，未经许可，禁止非法转载使用。</p>
							<p>注：本站商品信息均来自于厂商，其真实性、准确性和合法性由信息拥有者（厂商）负责。本站不提供任何保证，并不承担任何法律责任。</p>

						</div>
					</div>
					<!-- 售后保障 end -->

				</div>
			</div>
			<!-- 商品详情 end -->

			
		</div>
		<!-- 商品信息内容 end -->
		

	</div>
	<!-- 商品页面主体 end -->
	

	<div style="clear:both;"></div>

	<!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<div class="bnav1">
			<h3><b></b> <em>购物指南</em></h3>
			<ul>
				<li><a href="">购物流程</a></li>
				<li><a href="">会员介绍</a></li>
				<li><a href="">团购/机票/充值/点卡</a></li>
				<li><a href="">常见问题</a></li>
				<li><a href="">大家电</a></li>
				<li><a href="">联系客服</a></li>
			</ul>
		</div>
		
		<div class="bnav2">
			<h3><b></b> <em>配送方式</em></h3>
			<ul>
				<li><a href="">上门自提</a></li>
				<li><a href="">快速运输</a></li>
				<li><a href="">特快专递（EMS）</a></li>
				<li><a href="">如何送礼</a></li>
				<li><a href="">海外购物</a></li>
			</ul>
		</div>

		
		<div class="bnav3">
			<h3><b></b> <em>支付方式</em></h3>
			<ul>
				<li><a href="">货到付款</a></li>
				<li><a href="">在线支付</a></li>
				<li><a href="">分期付款</a></li>
				<li><a href="">邮局汇款</a></li>
				<li><a href="">公司转账</a></li>
			</ul>
		</div>

		<div class="bnav4">
			<h3><b></b> <em>售后服务</em></h3>
			<ul>
				<li><a href="">退换货政策</a></li>
				<li><a href="">退换货流程</a></li>
				<li><a href="">价格保护</a></li>
				<li><a href="">退款说明</a></li>
				<li><a href="">返修/退换货</a></li>
				<li><a href="">退款申请</a></li>
			</ul>
		</div>

		<div class="bnav5">
			<h3><b></b> <em>特色服务</em></h3>
			<ul>
				<li><a href="">夺宝岛</a></li>
				<li><a href="">DIY装机</a></li>
				<li><a href="">延保服务</a></li>
				<li><a href="">家电下乡</a></li>
				<li><a href="">京东礼品卡</a></li>
				<li><a href="">能效补贴</a></li>
			</ul>
		</div>
	</div>
	<!-- 底部导航 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
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
    <script type="text/javascript">
        $(function(){
            $('.jqzoom').jqzoom({
                zoomType: 'standard',
                lens:true,
                preloadImages: false,
                alwaysOn:false,
                title:false,
                zoomWidth:400,
                zoomHeight:400
            });
        })
    </script>
	<script type="text/javascript">
        //ajax加入到购物车
        $("#add_cart").click(function () {
           //商品goods_id
            var goods_id = $(this).attr('goods_id');
            //商品数量
            var goods_number =$("input[name='amount']").val();
            //获取商品的单选属性id
            var selected = $(".selected > input");
            var goods_attr_ids = [];
            for(var i=0;i<selected.length;i++){
                //获取value属性的值存到goods_attr_ids数组中
                goods_attr_ids.push(selected[i].value);
            }
            //把数组变为用逗号连接的字符串
            goods_attr_ids=goods_attr_ids.join(',');
            //发送ajax请求
            var param = {"goods_id":goods_id,"goods_attr_ids":goods_attr_ids,"goods_number":goods_number};
            $.get("<?php echo url('/home/goods/addGoodsToCart'); ?>",param,function(res){
                console.log(res);
                if(res.code == 200){
                    layer.confirm(res.message,{
                        btn:['去购物结算','再逛逛']
                    },function () {
                        //layer.msg('马上到购物车页面');
                        location.href = "<?php echo url('/home/cart/cartlist'); ?>";
                    },function () {

                    });
                }else if(res.code == -1){
                    layer.confirm(res.message,{
                        btn:['马上登录','再逛逛']
                    },function () {
                        //layer.msg('马上到登陆页面');
                        location.href = "<?php echo url('/home/public/login',['goods_id'=>$goods['goods_id']]); ?>";
                    },function () {

                    });
                }else{
                    layer.msg(res.message);
                }
            },'json');
        });

		document.execCommand("BackgroundImageCache", false, true);
	</script>
</body>
</html>