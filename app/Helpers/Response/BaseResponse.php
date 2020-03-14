<?php


namespace Haris\Helpers\Response;


/**
 * Class BaseResponse
 *
 * @package Haris\Helpers\Response
 *
 */
abstract class BaseResponse
{
    /**
     * @var bool
     */
    private static $instance = FALSE;

    /**
     * BaseResponse constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return bool|static
     *
     */
    public static function getInstance()
    {
        if(empty(self::$instance))
            self::$instance= new static();
        return self::$instance;
    }
}