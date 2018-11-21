<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:11
 */

namespace wechat\request;

use wechat\card\Card;

class CardCreateRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;


    /**
     * @var $card
     */
    private  $card;



    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/card/create";
    }


    /**
     * @param Card $card
     */
    public function setCard(Card $card){

        $this->card=$card;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getParams()
    {
        return $this->objectPublicToArray($this);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getBody()
    {
        return json_encode($this->objectPrivateToArray($this),JSON_UNESCAPED_UNICODE);
    }
}



