<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-16
 * Time: 上午12:20
 */

namespace wechat\response;


class CardCreateResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;


    /**
     * @var $card_id
     */
    public $card_id;


    /**
     * @param $response
     * @return object
     * @throws \ReflectionException
     */
    public function setData($response)
    {
        $responseArr = json_decode($response,true);
        return $this->arrayToObject($responseArr,$this);
    }
}