<?php
namespace app\home\model;
use think\Model;

class Member extends Model
{
    protected $pk = 'member_id';
    protected $autoWriteTimestamp = true;

    public static function init(){
        //入库前的事件
        Member::event('before_insert',function($member){
            //把密码进行加密
            //由于qq登录没有password选项，所以判断一下
            if(isset($member['password'])){
                $member['password'] = md5($member['password'].config('password_salt'));
            }
        });
        //更新密码前事件
        Member::event('before_update',function($member){
            //把密码进行加密
            $member['password'] = md5($member['password'].config('password_salt'));
        });
    }

    public function checkUser($username,$password){
        $where = [
          'username'=>$username,
            'password'=>md5($password.config('password_salt'))
        ];
        $userInfo = $this->where($where)->find();
        if($userInfo){
            session('member_username',$userInfo['username']);
            session('member_id',$userInfo['member_id']);
            return true;
        }else{
            return false;
        }
    }
}
?>
