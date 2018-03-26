<?php


namespace app\index\controller;

use think\Db;
use utils\Log;

class Demo{


    /**
     * 获取参数$_GET,$_POST参数
     * 注意：考虑到性能问题，默认的Request类没有对用户输入进行过滤，请自行对底层过滤，或开启waf进行过滤
     */
    function  params(){

        $params=getParams('');

        $page=getParams('page');

    }



    /**
     * 数据库演示
     * 访问地址：http://127.0.0.1:909/demo/db.html
     * 请根据数据库修改演示
     * @Author: zaoyongvip@gmail.com
     */
    function db(){
        $model=Db::table('user');

        $list=$model->where(['status'=>1])->find();

        return json($list);
    }




    /**
     * session 演示
     * 访问地址：http://127.0.0.1:909/demo/session.html
     * @Author: zaoyongvip@gmail.com
     */
    function session(){

        //事先打印session
        p(session('time'));

        //设置session

        session('time',time());

        //印session
        p(session('time'));


        //销毁session
        //session('time',null);

        //session(null);
    }


    /**
     * 队列演示
     * 后端处理逻辑请在start_queue.php中处理
     * 注意：若要使用队列，请将Config.php中的$cache 模式改成memcache 或者redis
     */
    function queue(){
        addToQueue('demo',['aaa','bbb']);
    }


    /**
     * 日志演示
     * @Author: zaoyongvip@gmail.com
     */
    function log(){
        Log::info('6666');
        Log::error('6666');
        Log::debug('6666');
        Log::error('6666');
    }
}