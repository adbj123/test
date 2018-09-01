<?php
    namespace app\home\controller;
    use app\home\model\Member;
    class PublicController extends CommonController{
        //前台注册
        public function register(){
            if(request()->isPost()){
                $postData = input('post.');
                //验证手机号码验证码是否正确
                $smscode = md5($postData['phoneCaptcha'].config('sms_salt'));
                if(cookie('smscode')!==$smscode){
                    $this->error("手机号码验证码错误");
                }
                $result = $this->validate($postData,'Member.register',[],true);
                if($result !== true){
                    $this->error(implode(',',$result));
                }
                $memberModel = new Member();
                if($memberModel->allowField(true)->save($postData)){
                    $this->success("添加成功",url("/home/public/login"));
                }else{
                    $this->error("添加失败");
                }
            }
            return $this->fetch();
        }
        //前台登陆
        public function login()
        {
            //测试是否成功
            //halt(sendSms('18823794258',array('666666',5)));
            //测试邮件发送
            //halt(sendEmail(['285240173@qq.com'],'明天放假','可以睡到中午两点'));
            if (request()->isPost()) {
                $postData = input('post.');
                $result = $this->validate($postData, 'Member.login', [], true);
                if ($result !== true) {
                    $this->error(implode(',', $result));
                }
                //匹配用户名和密码是否成功
                $memModel = new Member();
                $status = $memModel->checkUser($postData['username'],$postData['password']);
                if($status){
                    //给手机号验证码清空，防止被利用
                    cookie('smscode',null);
                    if(input('goods_id')){
                        $this->redirect('/home/goods/detail',['goods_id'=>input('goods_id')]);
                    }
                    $this->redirect('/home/index/index');
                }else{
                    $this->error("用户名或密码错误");
                }
            }
            return $this->fetch('');
        }
        //前台退出
        public function logout(){
            //清除session
            session('member_user',null);
            session('member_id',null);
            $this->redirect('/home/public/login');
        }
        //短信验证码
        public function sendSms(){
            if(request()->isAjax()){
                //1.接收手机号吗
                //echo '1111';die();
                $phone =input('phone');
                //2.验证手机号码没有注册才可以发送短信
                $result = Member::where('phone','=',$phone)->find();
                if($result){
                    //说明注册过了
                    $response = ['code'=>-1,'message'=>'手机号已被注册'];
                    echo json_encode($response);die();
                }
                $rand = mt_rand(1000,9999);
                $smsResult = sendSms($phone,[$rand,5]);
                //判断是否发送成功
                if($smsResult->statusCode == '000000'){
                    //把验证码和盐加密的结果写入cookie，有效期5分钟
                    cookie('smscode',md5($rand.config('sms_salt')),300);
                    $response = ['code'=>200,'message'=>'发送成功，请注意查收'];
                    echo json_encode($response);die;
                }else{
                    $response = ['code'=>-2,'message'=>'网络繁忙，请稍后再试'];
                    echo json_encode($response);die;
                }
            }
        }
        //，忘记密码
        public function forgetPassword(){
            return $this->fetch('');
        }
        //邮箱验证
        public function sendEmail(){
            if(request()->isAjax()){
                //接收email参数
                $email = input('email');
                //系统中必须有此邮件才发送
                $emailResult = Member::where("email",'=',$email)->find();
                //echo json_encode($emailResult);die;
                if(!$emailResult){
                    $response = ['code'=>-1,'message'=>'邮箱不存在'];
                    echo json_encode($response);die;
                }
                //有此邮箱，开始构造邮件链接地址发送给用户
                $member_id = $emailResult['member_id'];
                $time=time();
                //加密更加安全，用于后续验证链接地址的有效性
                $hash = md5($member_id.$time.config('password_salt'));
                $title = "拼哆哆-商城找回密码";
                //获取域名
                $href = request()->domain().'/index.php/home/public/change/'.$member_id.'/'.$hash.'/'.$time;
                $content = "<a href='{$href}'>想找回密码？点我啊！</a>";
                $result =sendEmail([$email],$title,$content);
                //判断是否发送成功
                if($result){
                    $response = ['code'=>200,'message'=>'发送邮件成功，请及时修改'];
                    echo json_encode($response);die;
                }else{
                    $response = ['code'=>-2,'message'=>'发送邮件失败'];
                    echo json_encode($response);die;
                }
            }
        }
        //路由参数绑定
        public function change($member_id,$hash,$time){
            //跳转到修改页面前，先判断链接有没有被修改和是否在有效期内
            $oldHash = md5($member_id.$time.config('password_salt'));
            if($oldHash != $hash){
                //说明被篡改了
                exit('链接地址有误，无法跳转');
            }
            //判断是否在有效期内（5分钟）
            if(time()>$time+10000){
                exit('超过有效时间，地址已失效');
            }

            //开始修改密码
            if(request()->isPost()){
                $postData = input('post.');
                $result = $this->validate($postData,"Member.change",[],true);
                if($result !== true){
                    $this->error(implode(',',$result));
                }
                //更新会员密码
                $memModel = new Member();
                $postData['password']=md5($postData['password'].config('password_salt'));
                //unset($postData['repassword']);
                $res = $memModel->update($postData,['member_id'=>$member_id],['password']);
                if($res){
                    $this->success('修改密码成功',url('/home/public/login'));
                }else{
                    $this->error('修改失败，请稍后再试');
                }
            }

             //输出页面
            return $this->fetch('');
        }
    }
?>
