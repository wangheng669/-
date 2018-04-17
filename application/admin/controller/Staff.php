<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Staff extends Base
{
    public function index($group_id='',$time=false)
    {
        if($time){
            $time=explode(" - ",$time);
            $staffList=model('Staff')->whereTime('create_time', 'between', [$time[0],$time[1]])->order('username','asc')->paginate(5,false,['query' => ['group_id'=>$group_id]]);
            $staffCount=model('Staff')->whereTime('create_time', 'between', [$time[0],$time[1]])->count();
        }else{
            $staffList=model('Staff')->where(['group_id'=>$group_id])->paginate(5,false,['query' => ['group_id'=>$group_id]]);
            $staffCount=model('Staff')->where('group_id',$group_id)->count();
        }
        if($group_id==''&&!$time){
            $staffList=model('Staff')->order('username','desc')->paginate(5);
        }
        $groupList=model('Group')->select();
        $staffCount=model('Staff')->count();
        return $this->fetch('staff-list',[
            'staffList'=>$staffList,
            'groupList'=>$groupList,
            'staffCount'=>$staffCount,
            'group_id'=>$group_id,
        ]);
    }
    public function saveStaff(){
        $post_data=request()->post();
        model('Score')->where(['staff_id'=>$post_data['id']])->update(['group_id'=>$post_data['group_id']]);
        return $this->operate('Staff',$post_data,true);
    }
    public function deleteStaff(){
        $post_data=request()->post();
        model('Score')->where(['staff_id'=>$post_data['id']])->delete();
        return $this->delete('Staff',$post_data);
    }
}
