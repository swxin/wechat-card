<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 2018/11/20
 * Time: 16:11
 */

namespace wechat\card;

class BaseInfo{

    private $logo_url;
    private $brand_name;
    private $code_type;
    private $title;
    private $color;
    private $notice;
    private $service_phone;
    private $description;
    private $date_info;
    private $sku;
    private $sub_title;
    private $use_limit;
    private $get_limit;
    private $use_custom_code;
    private $bind_openid;
    private $can_share;
    private $location_id_list;
    private $url_name_type;
    private $custom_url;


    function __construct($logo_url, $brand_name, $code_type, $title, $color, $notice, $service_phone,
                         $description, $date_info, $sku)
    {
        if (! $date_info instanceof DateInfo )
            exit("date_info Error");
        if (! $sku instanceof Sku )
            exit("sku Error");
        if (! is_int($code_type) )
            exit("code_type must be integer");
        $this->logo_url = $logo_url;
        $this->brand_name = $brand_name;
        $this->code_type = $code_type;
        $this->title = $title;
        $this->color = $color;
        $this->notice = $notice;
        $this->service_phone = $service_phone;
        $this->description = $description;
        $this->date_info = $date_info;
        $this->sku = $sku;
    }
    function set_sub_title($sub_title){
        $this->sub_title = $sub_title;
    }
    function set_use_limit($use_limit){

        $this->use_limit = $use_limit;
    }
    function set_get_limit($get_limit){

        $this->get_limit = $get_limit;
    }
    function set_use_custom_code($use_custom_code){
        $this->use_custom_code = $use_custom_code;
    }
    function set_bind_openid($bind_openid){
        $this->bind_openid = $bind_openid;
    }
    function set_can_share($can_share){
        $this->can_share = $can_share;
    }
    function set_location_id_list($location_id_list){
        $this->location_id_list = $location_id_list;
    }
    function set_url_name_type($url_name_type){

        $this->url_name_type = $url_name_type;
    }
    function set_custom_url($custom_url){
        $this->custom_url = $custom_url;
    }
};

class Sku{

    private $quantity;
    function __construct($quantity){
        $this->quantity = $quantity;
    }
};

class DateInfo{

    private $type;
    private $begin_timestamp;
    private $end_timestamp;
    private $fixed_term;
    private $fixed_begin_term;

    function __construct($type, $arg0, $arg1 = null)
    {


        $this->type = $type;
        if ( $type == 'DATE_TYPE_FIX_TIME_RANGE' )  //固定日期区间
        {
            if (!is_int($arg0) || !is_int($arg1))
                exit("begin_timestamp and  end_timestamp must be integer");
            $this->begin_timestamp = $arg0;
            $this->end_timestamp = $arg1;
        }
        else if ( $type == 'DATE_TYPE_FIX_TERM' )  //固定时长（自领取后多少天内有效）
        {
            if (!is_int($arg0))
                exit("fixed_term must be integer");
            $this->fixed_term = $arg0;
            $this->fixed_begin_term = $arg1;
        }else
            exit("DateInfo.tpye Error");
    }
};

class advancedInfo{

    private $use_condition;
    private $abstract;
    private $text_image_list=array();
    private $time_limit=array();
    private $business_service=array();




    function set_use_condition(useCondition $useCondition){
        $this->use_condition = $useCondition;
    }
    function set_abstract(abstractIcon $abstractIcon){

        $this->abstract = $abstractIcon;
    }
    function set_text_image_list(array $imageList){

        $this->text_image_list = $imageList;
    }
    function set_time_limit(array $timeLimit){
        $this->time_limit = $timeLimit;
    }
    function set_business_service(array $businessService){
        $this->business_service = $businessService;
    }

};


class useCondition{

    private $accept_category;
    private $reject_category;
    private $can_use_with_other_discount;
    function __construct($accept_category,$reject_category,$can_use_with_other_discount){
        $this->accept_category = $accept_category;
        $this->reject_category = $reject_category;
        $this->can_use_with_other_discount = $can_use_with_other_discount;
    }
};

class abstractIcon{

    private $abstract;
    private $icon_url_list=array();
    function __construct($abstract,array $icon_url_list){
        $this->abstract = $abstract;
        $this->icon_url_list = $icon_url_list;
    }

};

class textImageList{

    private $image_url;
    private $text;
    function __construct($image_url,$text){
        $this->image_url = $image_url;
        $this->text = $text;
    }
};
class timeLimit{

    private $type;
    private $begin_hour;
    private $end_hour;
    private $begin_minute;
    private $end_minute;
    function __construct($type,$begin_hour,$end_hour,$begin_minute,$end_minute){
        $this->type = $type;
        $this->begin_hour = $begin_hour;
        $this->end_hour = $end_hour;
        $this->begin_minute = $begin_minute;
        $this->end_minute = $end_minute;

    }
};



class GeneralCoupon{

    private $base_info;
    private $advanced_info;
    private $default_detail;

    public function __construct($base_info)
    {
        $this->base_info = $base_info;
    }
    public function set_advanced_info($advanced_info){

        $this->advanced_info=$advanced_info;
    }
    function set_default_detail($default_detail){
        $this->default_detail = $default_detail;
    }
};
class Groupon{

    private $base_info;
    private $advanced_info;
    private $deal_detail;

    public function __construct($base_info)
    {
        $this->base_info = $base_info;
    }
    public function set_advanced_info($advanced_info){

        $this->advanced_info=$advanced_info;
    }
    public function set_deal_detail($deal_detail){
        $this->deal_detail = $deal_detail;
    }
};
class Discount{

    private $base_info;
    private $advanced_info;
    private $discount;

    public function __construct($base_info)
    {
        $this->base_info = $base_info;
    }
    public function set_advanced_info($advanced_info){

        $this->advanced_info=$advanced_info;
    }
    function set_discount($discount){
        $this->discount = $discount;
    }
};
class Gift {
    private $base_info;
    private $advanced_info;
    private $gift;

    public function __construct($base_info)
    {
        $this->base_info = $base_info;
    }
    public function set_advanced_info($advanced_info){

        $this->advanced_info=$advanced_info;
    }

    function set_gift($gift){
        $this->gift = $gift;
    }
};
class Cash {

    private $base_info;
    private $advanced_info;
    private $least_cost;
    private $reduce_cost;

    public function __construct($base_info)
    {
        $this->base_info = $base_info;
    }
    public function set_advanced_info($advanced_info){

        $this->advanced_info=$advanced_info;
    }
    function set_least_cost($least_cost){
        $this->least_cost = $least_cost;
    }
    function set_reduce_cost($reduce_cost){
        $this->reduce_cost = $reduce_cost;
    }
};



class Card{  //工厂
    protected 	$CARD_TYPE = Array("GENERAL_COUPON",
        "GROUPON", "DISCOUNT",
        "GIFT", "CASH");

    private $card_type;
    private $general_coupon;
    private $groupon;
    private $discount;
    private $cash;
    private $gift;



    function __construct($card_type, $base_info)
    {
        if (!in_array($card_type, $this->CARD_TYPE))
            exit("CardType Error");
        if (! $base_info instanceof BaseInfo )
            exit("base_info Error");
        $this->card_type = $card_type;
        switch ($card_type)
        {
            case $this->CARD_TYPE[0]:
                $this->general_coupon = new GeneralCoupon($base_info);
                break;
            case $this->CARD_TYPE[1]:
                $this->groupon = new Groupon($base_info);
                break;
            case $this->CARD_TYPE[2]:
                $this->discount = new Discount($base_info);
                break;
            case $this->CARD_TYPE[3]:
                $this->gift = new Gift($base_info);
                break;
            case $this->CARD_TYPE[4]:
                $this->cash = new Cash($base_info);
                break;
            default:
                exit("CardType Error");
        }
        return true;
    }
    function get_card()
    {
        switch ($this->card_type)
        {
            case $this->CARD_TYPE[0]:
                return $this->general_coupon;
            case $this->CARD_TYPE[1]:
                return $this->groupon;
            case $this->CARD_TYPE[2]:
                return $this->discount;
            case $this->CARD_TYPE[3]:
                return $this->gift;
            case $this->CARD_TYPE[4]:
                return $this->cash;
            default:
                exit("GetCard Error");
        }
    }

};