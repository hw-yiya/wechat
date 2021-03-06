<?php
/**
 * Created by PhpStorm.
 * User: 周骁
 * Date: 2017/7/7
 * Time: 14:41
 */

namespace Wechat\Controller;


use Think\Controller;
use Think\Verify;
use User\Api\UserApi;


class UserController extends Controller
{
    /* 注册页面 */
    public function register($username = '', $password = '', $repassword = '', $email = '', $verify = ''){

        if(IS_POST){ //注册用户
            /* 检测验证码 */
            if(!check_verify($verify)){
                $this->error('验证码输入错误！');
            }

            /* 检测密码 */
            if($password != $repassword){
                $this->error('密码和重复密码不一致！');
            }

            /* 调用注册接口注册用户 */
            $User = new UserApi;
            $uid = $User->register($username, $password, $email);
            if(0 < $uid){ //注册成功
                //TODO: 发送验证邮件
                $this->success('注册成功！',U('login'));
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }

        } else { //显示注册表单
            $this->display();
        }
    }

    /* 登录页面 */
    public function login($username = '', $password = '', $verify = ''){
        if(IS_POST){ //登录验证
//            dump($verify);exit;
//            $verify = I('post.verify');
            /* 检测验证码 */
            if(!check_verify($verify)){
//                dump(I('post.verify'));exit;
                $this->error('验证码输入错误！');
            }

            $user = new UserApi();
            $uid = $user->login($username, $password);
            if(0 < $uid){ //UC登录成功
                /* 登录用户 */
                $Member = D('Member');
                if($Member->login($uid)){ //登录用户
                    //TODO:跳转到登录前页面
                    $this->success('登录成功！',U('Wechat/Center/index'));
                } else {
                    $this->error($Member->getError());
                }

            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }
        } else { //显示登录表单
            $this->display();
        }
    }

    /* 验证码，用于登录和注册 */
    public function verify(){
        $verify = new Verify();
        $verify->entry(1);
    }
    /* 退出登录 */
    public function logout(){
        if(is_login()){
            D('Member')->logout();
            $this->success('退出成功！', U('User/login'));
        } else {
            $this->redirect('User/login');
        }
    }
}