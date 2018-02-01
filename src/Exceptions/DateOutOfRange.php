<?php

namespace NitishRajUprety\NepaliDateConverter\Exception;

use Exception;

class DateOutOfRange extends Exception
{

    public function __construct($ln = 'en')
    {

        if($ln == 'en') {
            $message = 'Date out of range. Supported only between 1-31.';
        }
        else {
            $message = 'Date out of range. Supported only between 1-32.';
        }

        parent::__construct($message);
    }

}