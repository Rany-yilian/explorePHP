<?php
/**
 * Date: 2019/11/22
 * Time: 13:38
 */

namespace core;

class Driver
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config::getInstance();
    }


}