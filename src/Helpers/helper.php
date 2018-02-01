<?php

use NitishRajUprety\NepaliDateConverter\Exception\DateOutOfRange;
use NitishRajUprety\NepaliDateConverter\Exception\MonthOutOfRange;
use NitishRajUprety\NepaliDateConverter\Exception\YearOutOfRange;
use NitishRajUprety\NepaliDateConverter\NepaliDateConverter;

if(!function_exists('toNepali')) {

    /**
     * Convert English date to Nepali.
     *
     * @param int $yyyy
     * @param int $mm
     * @param int $dd
     * @param string $ln
     * @return array
     * @throws DateOutOfRange
     * @throws MonthOutOfRange
     * @throws YearOutOfRange
     */
    function toNepali($yyyy, $mm, $dd, $ln = 'en') {
        $nd = new NepaliDateConverter($ln);

        return $nd->toNepali($yyyy, $mm, $dd);
    }
}

if(!function_exists('toEnglish')) {

    /**
     * Convert Nepali date to English.
     *
     * @param int $yyyy
     * @param int $mm
     * @param int $dd
     * @param string $ln
     * @return array
     * @throws DateOutOfRange
     * @throws MonthOutOfRange
     * @throws YearOutOfRange
     */
    function toEnglish($yyyy, $mm, $dd, $ln = 'en') {
        $nd = new NepaliDateConverter($ln);

        return $nd->toEnglish($yyyy, $mm, $dd);
    }
}