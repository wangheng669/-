<?php

namespace app\admin\controller;

use app\admin\Controller\Basse;

class Test extends Base
{
    public function index()
    {
        $testList = model('Test')->select();
        $groupList = model('group')->select();
        $staffList = model('staff')->select();
        $testCount = model('Test')->count();
        return $this->fetch('test-list',[
            'testList'=>$testList,
            'testCount'=>$testCount,
            'groupList'=>$groupList,
            'staffList'=>$staffList,
        ]);
    }
    public function addTest(){
        $staffList=model('staff')->select();
        $groupList=model('group')->select();
        return $this->fetch('test-add',[
            'staffList'=>$staffList,
            'groupList'=>$groupList,
        ]);
    }
    public function saveTest(){
        $post_data=request()->post();
        if(isset($post_data['id']))
        {
            return $this->operate('Test',$post_data,true);
        }else{
            return $this->operate('Test',$post_data,false);
        }
    }
    //获取组成员
    public function staffApi(){
        $data=request()->post();
        $result=model('staff')
        ->where(['group_id'=>$data['group_id']])
        ->field('username,id')
        ->select();
        return $result;
    }
    public function deleteTest(){
        $post_data=request()->post();
        return $this->delete('Test',$post_data);
    }
}
