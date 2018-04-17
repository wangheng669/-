<?php

namespace app\admin\controller;

use app\admin\Controller\Base;

class Curve extends Base
{
    public function index()
    {
        $groupList=model('Group')->select();
        return $this->fetch('index',[
            'groupList'=>$groupList,
        ]);
    }
    //曲线图
    public function chartApi($group_id,$chart_type,$time){
        $time=explode(" - ",$time);
        $result_data=model('Score')
        ->alias('a')
        ->join('staff b','a.staff_id = b.id')
        ->join('group c','a.group_id = c.id')
        ->where(['a.group_id'=>$group_id])
        ->whereTime('a.create_time', 'between', [$time[0],$time[1]])
        ->field('username as name,group_name,staff_id,value,a.create_time')
        ->select();
        if($chart_type){
            return $result_data;
        }else{
            $result=[];
            $score=model('Score')->group('id')->select();
            foreach($result_data as $v){
                foreach($score as $j=>$k){
                    if($v['staff_id']==$k['staff_id']){
                        $result[$j]['data'][]=$v['value'];
                        $result[$j]['name']=$v['name'];
                        $result[$j]['type']='line';
                        $result[$j]['time'][]=date("m月d日",strtotime($v['create_time']));
                    }
                }
            }
            return array_merge($result);
        }
    }
}
