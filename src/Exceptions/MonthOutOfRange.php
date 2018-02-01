<?php

namespace NitishRajUprety\NepaliDateConverter\Exception;

use Exception;

class MonthOutOfRange extends Exception
{

    public function __construct()
    {

        $message = 'Month out of Range. Supported only between 1-12.';

        parent::__construct($message);
    }

}