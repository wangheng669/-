<?php

namespace app\admin\validate;

use think\Validate;

class Test extends Validate
{
    //定义规则
    protected $rule    = [
        'id'       => 'number',
        'group_id' => 'require|number|min:1',
        'staff_id' => 'require|number',
        'call_num' => 'require|number',
        'call_time' => 'require|number',
        'h_call' => 'require|number',
        'n_call' => 'require|number',
        'n_intention' => 'require|number',
        'h_intention' => 'require|number',
        'weixin' => 'require|number',
        'register' => 'require|number',
        'w_return' => 'require|number',
    ];
    protected $message = [
        'group_id.require' => '所属组不能为空',
        'staff_id.require' => '所属成员不能为空',
        'call_num.require' => '外呼次数不能为空',
        'call_time.require' => '外呼时长不能为空',
        'h_call.require' => '已接通不能为空',
        'n_call.require' => '未接通不能为空',
        'n_intention.require' => '无意向不能为空',
        'h_intention.require' => '有意向不能为空',
        'weixin.require' => '微信通过不能为空',
        'register.require' => '注册不能为空',
        'w_return.require' => '待回访不能为空',

        'staff_id.number' => '所属成员只能为数字',
        'call_num.number' => '外呼次数只能为数字',
        'call_time.number' => '外呼时长只能为数字',
        'h_call.number' => '已接通只能为数字',
        'n_call.number' => '未接通只能为数字',
        'n_intention.number' => '无意向只能为数字',
        'h_intention.number' => '有意向只能为数字',
        'weixin.number' => '微信通过只能为数字',
        'register.number' => '注册只能为数字',
        'w_return.number' => '待回访只能为数字',
    ];
}
