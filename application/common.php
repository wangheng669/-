<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function group($val){
    $group=model('Group')->get($val);
    return $group['group_name'];
}
function staff($val){
    $staff=model('Staff')->get($val);
    return $staff['username'];
}
function scoreCount($val){
    $scoreCount=model('Score')->where(['staff_id'=>$val])->count();
    return $scoreCount;
}
function testCount($val){
    $testCount=model('Test')->where(['staff_id'=>$val])->count();
    return $testCount;
}