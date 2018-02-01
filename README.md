## Nepali Date Converter
Converts Gregorian date to Bikram Samvat date and vice versa.

## Installation

`composer require nitishrajuprety/nepalidateconverter`

## Usage

**Gregorian to Bikram Samvat**

`$nepaliDateConverter = new NepaliDateConverter(lang);`

`$date = $nepaliDateConverter->toNepali(yyyy, mm, dd);`

_or_

`$date = toNepali(yyyy, mm, dd, lang);`

Returns an array with converted values.

<br>
<br>

**Bikram Samvat to Gregorian**

`$nepaliDateConverter = new NepaliDateConverter(lang);`

`$date = $nepaliDateConverter->toEnglish(yyyy, mm, dd);`

_or_

`$date = toEnglish(yyyy, mm, dd, lang);`

<br>
<br>

If no argument is given for _lang_ then the values are returned in english. Possible values are _'ne'_ for Nepali or _'en'_ for English. All passed arguments must be in English.

