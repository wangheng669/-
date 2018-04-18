<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Score extends Base
{
    public function index($group_id='',$time=false)
    {
        $otime=$time;
        if($time){
            $time=explode(" - ",$time);
            $scoreList=model('Score')->whereTime('create_time', 'between', [$time[0],$time[1]])->order('staff_id','asc')->paginate(5,false,['query' => ['group_id'=>$group_id]]);
            $scoreCount=model('Score')->whereTime('create_time', 'between', [$time[0],$time[1]])->count();
        }else{
            $scoreList=model('Score')->where('group_id',$group_id)->order('staff_id','asc')->paginate(5,false,['query' => ['group_id'=>$group_id]]);
            $scoreCount=model('Score')->where('group_id',$group_id)->count();
        }
        if($group_id==''&&!$time){
            $scoreList=model('Score')->order('staff_id','asc')->paginate(5);
        }
        $staffList=model('Staff')->select();
        $groupList=model('Group')->select();
        return $this->fetch('score-list',[
            'scoreList'=>$scoreList,
            'staffList'=>$staffList,
            'groupList'=>$groupList,
            'scoreCount'=>$scoreCount,
            'group_id'=>$group_id,
            'time'=>$otime,
        ]);
    }
    public function groupApi(){
        $groupList=model('Group')->select();
        return $groupList;
    }
    public function addScore()
    {
        return $this->fetch('score-add');
    }
    public function editScore($id)
    {
        $scoreEdit=model('Score')->get($id);
        return $this->fetch('score-edit',[
            'scoreEdit'=>$scoreEdit,
        ]);
    }
    public function saveScore()
    {
        $post_data=request()->post();
        return $this->operate('Score',$post_data,true);
    }
    public function deleteScore(){
        $post_data=request()->post();
        return $this->delete('Score',$post_data);
    }
}
