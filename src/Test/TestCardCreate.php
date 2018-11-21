<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午11:48
 */

require __DIR__.'/../../vendor/autoload.php';
$client = new \wechat\Client();
$response = $client->http_get("https://api.oppein.cn/wechat/accesstoken/getaccesstoken/wx63b69c06d249955a");
$access_token = json_decode($response,true)['access_token'];


$client->setDomain('https://api.weixin.qq.com');




$request = new \wechat\request\CardCreateRequest();

$request->access_token = $access_token;



$base_info =new \wechat\card\BaseInfo(
    "http://www.supadmin.cn/uploads/allimg/120216/1_120216214725_1.jpg", "海底捞",
    0, "132元双人火锅套餐", "Color010", "使用时向服务员出示此券", "020-88888888",
    "不可与其他优惠",
    new \wechat\card\DateInfo('DATE_TYPE_FIX_TERM', 10,0),
    new  \wechat\card\Sku(50000000)

);
$base_info->set_sub_title( "大减价" );
$base_info->set_use_limit( 1 );
$base_info->set_get_limit( 3 );
$base_info->set_use_custom_code( false );
$base_info->set_bind_openid( false );
$base_info->set_can_share( true );
$base_info->set_url_name_type( 1 );
$base_info->set_custom_url( "http://www.qq.com" );


$advanced_info=new \wechat\card\advancedInfo();
$advanced_info->set_use_condition(new \wechat\card\useCondition('鞋类','阿迪达斯',true));
$advanced_info->set_abstract(new \wechat\card\abstractIcon('微信餐厅推出多种新季菜品，期待您的光临',array('http://mmbiz.qpic.cn/mmbiz/p98FjXy8LacgHxp3sJ3vn97bGLz0ib0Sfz1bjiaoOYA027iasqSG0sj
  piby4vce3AtaPu6cIhBHkt6IjlkY9YnDsfw/0')));
$advanced_info->set_text_image_list(array(
    new \wechat\card\textImageList('http://mmbiz.qpic.cn/mmbiz/p98FjXy8LacgHxp3sJ3vn97bGLz0ib0Sfz1bjiaoOYA027iasqSG0sjpiby4vce3AtaPu6cIhBHkt6IjlkY9YnDsfw/0','此菜品精选食材，以独特的烹饪方法，最大程度地刺激食 客的味蕾')
));



$card =new \wechat\card\Card('GROUPON',$base_info);

$card->get_card()->set_advanced_info($advanced_info);
$card->get_card()->set_deal_detail( "以下锅底2 选1（有菌王锅、麻辣锅、大骨锅、番茄锅、清补凉锅、酸菜鱼锅可选）：\n 大锅1 份12 元\n 小锅2 份16 元\n 以下菜品2 选1\n 特级肥牛1 份30 元\n 洞庭鮰鱼卷1 份20元\n 其他\n鲜菇猪肉滑1 份18 元\n 金针菇1 份16 元\n 黑木耳1 份9 元\n 娃娃菜1 份8 元\n 冬瓜1份6 元\n 火锅面2 个6 元\n 欢乐畅饮2 位12 元\n 自助酱料2 位10 元" );


$request->setCard($card);


//var_dump($request);
//exit();


$response = new \wechat\response\CardCreateResponse();
/** @var \wechat\response\CardCreateResponse $response */
$response = $client->execute($request,$response);
var_export($response);