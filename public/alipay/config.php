<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091700535185",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAqYNb8G8AwiSofQ7hxbey5ZkfSPeahPpWNSu1Su9VhP24n2fHiEN/WZTbwi5RFL8pzKQ1mSun+/1lWTPLCdePBwbv8uBr4Q+u7FMAJmXY7r+eSTGqiSmKKVa4+MCiE7USLo4FT/NorC3H4WsNVhOEBjKIk558G9TW3PV5F4lcc0Y+or5P+Z9mpI5WTI9ZtHngbd9+l6sFuwRN1yP4Bi7r/fHC70voy3inFdeVif60yBbaL+eZxI1AujVf8oAaE1OsQ2BBADGqKRuqBQgq6FRn0xQuiaQ+SW+IWarDg9Q1bSjQa2o11e8upUKA3Qm3+a968EHxUjqsCX0701a337UNowIDAQABAoIBAF0eFMY6I/+CJbA1GZ8EL1jiyYXKxm4gGnUw4nEckizxN5cRalGXSoDKPgIocU/lRy/sUKkoiyno4+Chi/qHGEGy9OLFl11VwTB+08lED2vvhSMODnE0iXn18rxrDV2oDSnXyGFIBAr5RyC0LupG5DKHVfFJkUG0pKdSjUd5pHiJi/2PMfP/Ltmsa/3At87DfaIvTjYolWde31jy3BrvU4sB2hxfATta5vdzakTM/Q3Z65Q/yuJebcQkRXMr42WK9NOxoOZk2aI3+iaysEk/jGw3FmZW57U/coyJ4KplwabcZhPzuNo9h7jSlAmlb/wrst1WvoLZbYHNRf6SxPbrQkkCgYEA0/tNqyTiR0RQkOuKUQkBupG3EcDB0jiFxkvsrXM/UH/lVd2OgTSEgrb98Iw0hXubWsZ/VtzhBxLnglgHnG6Gy6wGG2c+kcVo0zMbNszgsmDM9K5sXWGOIv+PU4fDK8C2++NAeYROmE22tL/2nx+bVIbizox5SXqfzaQMIYzsrP8CgYEAzLZ6cGagE1hlYZVLR1IVQOtY5b45KqK53z51lSBRtpjIY1Nk5AynDrcbra3rDWxq7u5WBywSBiqdMNcyCferGt4d4K2mt30Q5H8iZjdtcHU/OMszy+nMnofrdWpYwhOYXy2QdhWqVFmmFl04AV4H9F8xC0Ch5waQhSznXWN0y10CgYAtjvQJVTsAgBEkpEqs0de6RjjnKts9GALANG8gdAVmgqZCRwSqhiP4h+WZvjhHe+JOpxyVCZGfWJPC8rJoD2UO/uCtIQpUf+3gfjpaE7wy+hTyfU4y35WRtgUSubnbfGaXSicANsxBdWpP/HW/iyZyCy9RnuUuQpl3s8sbptLy9wKBgQC/vYshDH6SoBEVPYis3K0biVRSm8FftdryxsXLT+I5bREEN3AgSdmPZuJ94pBumkXuVT4uqZCYRgHFZUpxG5EgMTs63mtxIatY2duWcgQHeUomH+376JjHQ/e+mkVYQpJNU5gjgldveiieeeGjJje9JAwDxh3fDb7/ffeW+TjD4QKBgByxwlWqs/Lg54454cyw2VnZ4MI0AJYkhCzA0+MklQ+4nev33Cv7Vy8ynqEQW0Vg0hyliONDcUsU0j1sdNKiXIaPKY3ttPyiDLU3vfm+3OoKIE/XYI0yLbTTqCvFrX4UR+5PUtYo37b9n6BJHBO2TH4/83l8mI2tAu+UhHVqvPvQ",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQ/acKKOUoqALyP1l+wjpD9xtJyXdeXfxa3EghP490gdDahKelxl9eX1MoEDLCztzU3aODgi+Ykcr5HXJ9E0zDD5SBJjS24vY6446+7xWqYv0CFHTBk4jCWFeB71Fode0PngHcGt+YsMgXjYpx3PkgovX8MR5jJREcFUxYrEFDjPwqHPLaa/nBVgp7zzO83+bxJScviZUsajsdE93pvKixl9HYJdn5KNEEEsv7QrD3lifm1A6folDnZl2cMYE7HKzDP1AXSzO85ZQKS7T5P8N8Nqgh0DOuVAH+jyyzFM+TBc4ZDx22L97AlhxFg01u9ufcoEvmf66soG4h49QLeRiwIDAQAB",
);