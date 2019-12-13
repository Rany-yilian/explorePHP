<?php
/**
 * Date: 2019/11/22
 * Time: 13:38
 */

namespace core;

interface Driver
{

    public function init();

    public function before();

    public function after();

}