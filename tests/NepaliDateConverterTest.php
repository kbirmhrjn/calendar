<?php

namespace Kabir;

use PHPUnit_Framework_TestCase;

class NepaliDateConverterTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    public function should_be_able_to_convert_english_date_to_nepali()
    {
        # what my api should look like,
        # 1. Calendar::now()->toNepali('default format');
        # 2. Calendar::parse('Nepali/English')->toEnglish();
        # 2. Calendar::parse('Nepali/English')->toNepali();
        # 4. should implement __toString()
        // $cal = Calendar::now()->toNepali();
        $cal = new Calendar();
        $nepaliDate = $cal->eng_to_nep(2008,11,23);

        $this->assertEquals($nepaliDate['year'], 2065);
        $this->assertEquals($nepaliDate['month'], 8);
        $this->assertEquals($nepaliDate['date'], 8);
        $this->assertEquals($nepaliDate['day'], "Sunday");
        $this->assertEquals($nepaliDate['nmonth'], "Mangshir");
    }

    /** @test */
    public function should_be_able_to_convert_nepali_date_to_english()
    {
        $cal = new Calendar();
        $nepaliDate = $cal->nep_to_eng(2065,8,8);
        $cal->eng_to_nep(2008,11,23);

        $this->assertEquals($nepaliDate['year'], 2008);
        $this->assertEquals($nepaliDate['month'], 11);
        $this->assertEquals($nepaliDate['date'], 23);
        $this->assertEquals($nepaliDate['day'], "Sunday");
        $this->assertEquals($nepaliDate['emonth'], "November");
    }
}