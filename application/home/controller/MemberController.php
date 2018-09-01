<?php
    namespace app\home\controller;
    use app\home\model\Member;
    use think\Controller;
    class MemberController extends Controller{
        public function qqLogin(){
            //执行三行代码
            require_once ("../extend/qqLogin/API/qqConnectAPI.php");
            $qc = new \QC();
            $qc->qq_login();
        }
        public function qqCallback(){
            require_once("../extend/qqLogin/API/qqConnectAPI.php");
            //获取到token和openid
            $qc = new \QC();
            $token = $qc->qq_callback();
            $openid = $qc->get_openid();

//            echo "token:".$token;
//            echo "<hr/>";
//            echo "openid:".$openid;
//            echo "<hr/>";
//            //通过token和openid作为参数，重新实例化C类
//            $qc = new \QC($token,$openid);
//            $qqInfo = $qc->get_user_info();

            //1.判断openid是否与系统绑定过
            $userInfo = Member::where('openid','=',$openid)->find();
            if($userInfo){
                //说明之前有登陆过
                session('member_username',$userInfo['nickname']);
                session('member_id',$userInfo['member_id']);
                $this->redirect("/");
            }else{
                //首次登陆，把用户信息写入数据库
                $qc = new \QC($token,$openid);
                $qqInfo = $qc->get_user_info();
                $data = [
                    'openid'=>$openid,
                    'nickname'=>$qqInfo['nickname']
                ];
                $user = Member::create($data);
                //写入session
                session('member_username',$qqInfo['nickname']);
                session('member_id',$user['member_id']);
                $this->redirect("/");
            }
        }
    }

?>