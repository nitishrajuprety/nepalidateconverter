<?php

namespace NitishRajUprety\NepaliDateConverter;

use NitishRajUprety\NepaliDateConverter\Exception\DateOutOfRange;
use NitishRajUprety\NepaliDateConverter\Exception\MonthOutOfRange;
use NitishRajUprety\NepaliDateConverter\Exception\YearOutOfRange;

class NepaliDateConverter {

    private $yr_mn = [
        0 => [
            2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        1 => [
            2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        2 => [
            2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        3 => [
            2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        4 => [
            2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        5 => [
            2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        6 => [
            2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        7 => [
            2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        8 => [
            2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31
        ],
        9 => [
            2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        10 => [
            2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        11 => [
            2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        12 => [
            2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30
        ],
        13 => [
            2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        14 => [
            2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        15 => [
            2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        16 => [
            2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30
        ],
        17 => [
            2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        18 => [
            2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        19 => [
            2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        20 => [
            2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        21 => [
            2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        22 => [
            2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30
        ],
        23 => [
            2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        24 => [
            2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        25 => [
            2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        26 => [
            2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        27 => [
            2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        28 => [
            2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        29 => [
            2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30
        ],
        30 => [
            2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        31 => [
            2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        32 => [
            2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        33 => [
            2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        34 => [
            2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        35 => [
            2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31
        ],
        36 => [
            2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        37 => [
            2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        38 => [
            2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        39 => [
            2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30
        ],
        40 => [
            2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        41 => [
            2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        42 => [
            2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        43 => [
            2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30
        ],
        44 => [
            2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        45 => [
            2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        46 => [
            2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        47 => [
            2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        48 => [
            2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        49 => [
            2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30
        ],
        50 => [
            2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        51 => [
            2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        52 => [
            2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        53 => [
            2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30
        ],
        54 => [
            2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        55 => [
            2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        56 => [
            2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30
        ],
        57 => [
            2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        58 => [
            2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        59 => [
            2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        60 => [
            2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        61 => [
            2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        62 => [
            2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31
        ],
        63 => [
            2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        64 => [
            2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        65 => [
            2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        66 => [
            2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31
        ],
        67 => [
            2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        68 => [
            2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        69 => [
            2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        70 => [
            2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30
        ],
        71 => [
            2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        72 => [
            2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30
        ],
        73 => [
            2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31
        ],
        74 => [
            2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        75 => [
            2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        76 => [
            2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30
        ],
        77 => [
            2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31
        ],
        78 => [
            2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        79 => [
            2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30
        ],
        80 => [
            2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30
        ],
        81 => [
            2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30
        ],
        82 => [
            2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30
        ],
        83 => [
            2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30
        ],
        84 => [
            2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30
        ],
        85 => [
            2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30
        ],
        86 => [
            2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30
        ],
        87 => [
            2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30
        ],
        88 => [
            2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30
        ],
        89 => [
            2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30
        ],
        90 => [
            2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30
        ]
    ];

    private $en_mn = [
        'leap' => [
            31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
        ],
        'normal' => [
            31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
        ]
    ];

    private $ne_mn = [
        'leap' => [
            0, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
        ],
        'normal' => [
            0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
        ]
    ];

    private $ln;

    private $months = [
        'english' => [
            'en' => [
                1 => 'January',
                2 => 'February',
                3 => 'March',
                4 => 'April',
                5 => 'May',
                6 => 'June',
                7 => 'July',
                8 => 'August',
                9 => 'September',
                10 => 'October',
                11 => 'November',
                12 => 'December'
            ],
            'ne' => [
                1 => 'ज्यानुवरी',
                2 => 'फेब्रुअरी',
                3 => 'मार्च',
                4 => 'अप्रिल',
                5 => 'मे',
                6 => 'जुन',
                7 => 'जुलाई',
                8 => 'अगष्ट',
                9 => 'सेप्टेम्बर',
                10 => 'अक्टुबर',
                11 => 'नोवेम्बर',
                12 => 'डिसेम्बर'
            ]
        ],
        'nepali' => [
            'en' => [
                1 => 'Baishakh',
                2 => 'Jestha',
                3 => 'Ashadh',
                4 => 'Shrawan',
                5 => 'Bhadra',
                6 => 'Ashwin',
                7 => 'Kartik',
                8 => 'Mangsir',
                9 => 'Poush',
                10 => 'Magh',
                11 => 'Falgun',
                12 => 'Chaitra'
            ],
            'ne' => [
                1 => 'बैशाख',
                2 => 'जेष्ठ',
                3 => 'अषाढ',
                4 => 'श्रावन',
                5 => 'भाद्र',
                6 => 'अश्विन',
                7 => 'कार्तिक',
                8 => 'मंसीर',
                9 => 'पौष',
                10 => 'माघ',
                11 => 'फाल्गुन',
                12 => 'चैत्र'
            ]
        ]
    ];

    private $days = [
        'en' => [
            1 => 'Sunday',
            2 => 'Monday',
            3 => 'Tuesday',
            4 => 'Wednesday',
            5 => 'Thursday',
            6 => 'Friday',
            7 => 'Saturday'
        ],
        'ne' => [
            1 => 'आइतवार',
            2 => 'सोमवार',
            3 => 'मंगलवार',
            4 => 'बुधवार',
            5 => 'बिहिवार',
            6 => 'शुक्रवार',
            7 => 'शनिवार'
        ]
    ];

    private $nn = [
        0 => '०',
        1 => '१',
        2 => '२',
        3 => '३',
        4 => '४',
        5 => '५',
        6 => '६',
        7 => '७',
        8 => '८',
        9 => '९'
    ];

    public $date = null;

    /**
     * NepaliDate constructor.
     *
     * @param string $ln
     */
    public function __construct($ln = 'en')
    {
        $this->ln = $ln;
    }

    /**
     * Gets name of the Nepali month.
     *
     * @param $month
     * @param string|null $ln
     * @return string
     */
    private function getNepaliMonth($month, $ln = null)
    {
        if(is_null($ln)) {
            $ln = $this->ln;
        }

        return $this->months['nepali'][$ln][(int)$month];
    }

    /**
     * Gets name of the English month.
     *
     * @param $month
     * @param string|null $ln
     * @return string
     */
    private function getEnglishMonth($month, $ln = null)
    {
        if(is_null($ln)) {
            $ln = $this->ln;
        }

        return $this->months['english'][$ln][(int)$month];
    }

    /**
     * Gets the name of the day.
     *
     * @param $day
     * @param string|null $ln
     * @return string
     */
    private function getDayOfWeek($day, $ln = null)
    {
        if(is_null($ln)) {
            $ln = $this->ln;
        }

        return $this->days[$ln][$day];
    }

    /**
     * Checks if the english date is in range.
     *
     * @param int $y
     * @param int $m
     * @param int $d
     * @return bool
     * @throws DateOutOfRange
     * @throws MonthOutOfRange
     * @throws YearOutOfRange
     */
    private function isInRangeEng($y, $m, $d)
    {
        if($y<1944 || $y>2033){
            throw new YearOutOfRange;
        }

        if($m<1 || $m >12){
            throw new MonthOutOfRange;
        }

        if($d<1 || $d >31){
            throw new DateOutOfRange;
        }

        return true;
    }

    /**
     * Checks if the nepali date is in range.
     *
     * @param int $y
     * @param int $m
     * @param int $d
     * @return bool
     * @throws DateOutOfRange
     * @throws MonthOutOfRange
     * @throws YearOutOfRange
     */
    private function isInRangeNep($y, $m, $d)
    {
        if($y<2000 || $y>2089){
            throw new YearOutOfRange('ne');
        }

        if($m<1 || $m >12){
            throw new MonthOutOfRange;
        }

        if($d<1 || $d >31){
            throw new DateOutOfRange('ne');
        }

        return true;
    }

    /**
     * Checks if a given year is leap year or not.
     *
     * @param int $year
     * @return bool
     */
    private function checkLeapYear($year)
    {
        if ($year % 100 == 0)
        {
            if($year %400 == 0)
            {
                return true;
            } else {
                return false;
            }

        } else {
            if ($year %4 ==0 )
            {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Returns nepali date data array.
     *
     * @param int $year
     * @param int $month
     * @param int $date
     * @param int $day
     * @param int $num_day
     * @return array
     */
    private function returnNepali($year, $month, $date, $day, $num_day)
    {
        $ln = $this->ln;

        $this->date = [
            'year' => $this->numByLang($year),
            'month' => $this->numByLang($month),
            'date' => $this->numByLang($date),
            'day' => $this->getDayOfWeek($day, $ln),
            'nepali_month' => $this->getNepaliMonth($month, $ln),
            'num_day' => $this->numByLang($num_day)
        ];

        return $this->date;
    }

    /**
     * Returns english date data array.
     *
     * @param $year
     * @param $month
     * @param $date
     * @param $day
     * @param $num_day
     * @return array|null
     */
    private function returnEnglish($year, $month, $date, $day, $num_day)
    {
        $ln = $this->ln;

        $this->date = [
            'year' => $this->numByLang($year),
            'month' => $this->numByLang($month >= 10 ? $month : '0'.$month),
            'date' => $this->numByLang($date >= 10 ? $date : '0'.$date),
            'day' => $this->getDayOfWeek($day, $ln),
            'english_month' => $this->getEnglishMonth($month, $ln),
            'num_day' => $this->numByLang($num_day)
        ];

        return $this->date;
    }

    private function numByLang($num)
    {
        if($this->ln == 'en') {
            return $num;
        }
        else {
            $n = (string) $num;
            $ret = '';
            for($i = 0; $i < strlen($n); $i++) {
                $ret .= $this->nn[$n[$i]];
            }
            return $ret;
        }
    }

    /**
     * Convert English date to Nepali.
     *
     * @param int $yyyy
     * @param int $mm
     * @param int $dd
     * @return array
     * @throws DateOutOfRange
     * @throws MonthOutOfRange
     * @throws YearOutOfRange
     */
    public function toNepali($yyyy, $mm, $dd)
    {
        if($this->isInRangeEng($yyyy, $mm, $dd)) {
            $eys = 1944;
            $nys = 2000;
            $tde = 0;
            $tdn = 0;
            $nms = 9;
            $nds = 17-1;
            $day = 7-1;
            $a = $m = $y = $i = $j = $nd = 0;

            for($i = 0; $i < ($yyyy - $eys); $i++) {
                if($this->checkLeapYear($eys+$i) == 1) {
                    for($j = 0; $j < 12; $j++) {
                        $tde += $this->en_mn['leap'][$j];
                    }
                }
                else {
                    for($j = 0; $j < 12; $j++) {
                        $tde += $this->en_mn['normal'][$j];
                    }
                }
            }

            for($i = 0; $i < ($mm - 1); $i++) {
                if($this->checkLeapYear($yyyy) == 1) {
                    $tde += $this->en_mn['leap'][$i];
                }
                else {
                    $tde += $this->en_mn['normal'][$i];
                }
            }

            $tde += $dd;

            $i = 0;
            $j = $nms;
            $tdn = $nds;
            $m = $nms;
            $y = $nys;

            while($tde != 0) {
                $a = $this->yr_mn[$i][$j];
                $tdn++;
                $day++;

                if($tdn > $a) {
                    $m++;
                    $tdn = 1;
                    $j++;
                }

                if($day > 7) {
                    $day = 1;
                }

                if($m > 12) {
                    $y++;
                    $m = 1;
                }

                if($j > 12) {
                    $j = 1;
                    $i++;
                }
                $tde--;
            }

            $nd = $day;

            return $this->returnNepali($y, $m, $tdn, $day, $nd);
        }
    }

    /**
     * Convert Nepali date to English.
     *
     * @param int $yyyy
     * @param int $mm
     * @param int $dd
     * @return array|null
     * @throws DateOutOfRange
     * @throws MonthOutOfRange
     * @throws YearOutOfRange
     */
    public function toEnglish($yyyy, $mm, $dd)
    {
        $eys = 1943;
        $ems = 4;
        $eds = 14-1;
        $nys = 2000;
        $nms = 1;
        $nds = 1;
        $tde = 0;
        $tdn = 0;
        $a = 0;
        $day = 4-1;
        $m = $y = $i = $k = $nd = 0;

        if($this->isInRangeNep($yyyy, $mm, $dd)) {
            for($i = 0; $i < ($yyyy - $nys); $i++) {
                for($j = 1; $j<=12; $j++) {
                    $tdn += $this->yr_mn[$k][$j];
                }
                $k++;
            }

            for($j = 1; $j < $mm; $j++) {
                $tdn += $this->yr_mn[$k][$j];
            }

            $tdn += $dd;

            $tde = $eds;
            $m = $ems;
            $y = $eys;

            while($tdn != 0) {
                if($this->checkLeapYear($y)) {
                    $a = $this->ne_mn['leap'][$m];
                }
                else {
                    $a = $this->ne_mn['normal'][$m];
                }

                $tde++;
                $day++;

                if($tde > $a) {
                    $m++;
                    $tde = 1;
                    if($m > 12) {
                        $y++;
                        $m = 1;
                    }
                }

                if($day > 7) {
                    $day = 1;
                }

                $tdn--;
            }
            $nd = $day;

            return $this->returnEnglish($y, $m, $tde, $day, $nd);
        }
    }

}