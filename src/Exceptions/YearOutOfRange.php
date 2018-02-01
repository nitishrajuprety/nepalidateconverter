<?php

namespace NitishRajUprety\NepaliDateConverter\Exception;

use Exception;

class YearOutOfRange extends Exception
{

    public function __construct($ln = 'en')
    {
        if($ln == 'en') {
            $message = 'Year out of Range. Supported only between 1944 A.D. - 2022 A.D.';
        }
        else {
            $message = 'Year out of Range. Supported only between 2000 B.S. - 2089 B.S.';
        }

        parent::__construct($message);
    }

}