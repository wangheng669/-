<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Contrast extends Base
{
    public function index()
    {
        $groupList=model('Group')->select();
        $staffList=model('Staff')->select();
        return $this->fetch('contrast-list',[
            'staffList'=>$staffList,
            'groupList'=>$groupList,
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
    public function contrastApi($type=0){
        $data=request()->post();
        if($data['type']){
            if(isset($data['group'])){
                $result=model('group')
                ->alias('a')
                ->join('test b','b.group_id = a.id')
                ->where('group_id','in',$data['group'])
                ->select();
                $group=model('group')->group('id')->where('id','in',$data['group'])->select();
                $result_data=[];
                foreach($result as $v){
                    foreach($group as $k=>$j){
                        if($v['group_name']==$j['group_name']){
                            if(!isset($result_data[$k]['call_num'])){
                                $result_data[$k]['call_num']=0;
                                $result_data[$k]['call_time']=0;
                                $result_data[$k]['h_call']=0;
                                $result_data[$k]['n_call']=0;
                                $result_data[$k]['n_intention']=0;
                                $result_data[$k]['h_intention']=0;
                                $result_data[$k]['weixin']=0;
                                $result_data[$k]['register']=0;
                                $result_data[$k]['w_return']=0;
                                $result_data[$k]['clinch']=0;
                            }
                            $result_data[$k]['call_num']+=$v['call_num'];
                            $result_data[$k]['call_time']+=$v['call_time'];
                            $result_data[$k]['h_call']+=$v['h_call'];
                            $result_data[$k]['n_call']+=$v['n_call'];
                            $result_data[$k]['n_intention']+=$v['n_intention'];
                            $result_data[$k]['h_intention']+=$v['h_intention'];
                            $result_data[$k]['weixin']+=$v['weixin'];
                            $result_data[$k]['register']+=$v['register'];
                            $result_data[$k]['w_return']+=$v['w_return'];
                            $result_data[$k]['clinch']+=$v['clinch'];
                            $result_data[$k]['create_time']=$v['create_time'];
                        }
                    }
                }
                return array_merge($result_data);
            }else if(isset($data['staff'])){
                $result=model('staff')
                ->alias('a')
                ->join('test b','a.id = b.staff_id')
                ->where('staff_id','in',$data['staff'])
                ->select();
                return $result;
            }
        }else{
            if(isset($data['group'])){
                $result=model('score')
                ->alias('a')
                ->join('group b','a.group_id = b.id')
                ->where('group_id','in',$data['group'])
                ->field('value,a.create_time,b.group_name as name')
                ->select();
                $group=model('group')->group('id')->where('id','in',$data['group'])->select();
                $result_data=[];
                foreach($result as $v){
                    foreach($group as $k=>$j){
                        if($v['name']==$j['group_name']){
                            $result_data[$k]['name']=$v['name'];
                            if(!isset($result_data[$k]['value'])){
                                $result_data[$k]['value']=0;
                            }
                            $result_data[$k]['value']+=$v['value'];
                            $result_data[$k]['create_time']=$v['create_time'];
                        }
                    }
                }
                return array_merge($result_data);
            }else if(isset($data['staff'])){
                $result=model('score')
                ->alias('a')
                ->join('staff b','a.staff_id = b.id')
                ->where('staff_id','in',$data['staff'])
                ->field('value,a.create_time,b.username as name')
                ->select();
                return $result;    
            }
        }
    }
}
