<?php
/**
 * @copyright CONTENT CONTROL GmbH, http://www.contentcontrol-berlin.de
 * @author CONTENT CONTROL GmbH, http://www.contentcontrol-berlin.de
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace OpenPsa\Ranger;

use PHPUnit_Framework_TestCase;
use IntlDateFormatter;

class RangerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerDateRange
     */
    public function testDateRange($language, $start, $end, $expected)
    {
        $formatter = new Ranger($language);
        $this->assertEquals($expected, $formatter->format($start, $end));
    }

    public function providerDateRange()
    {
        return array
        (
            array('en', '2013-10-05', '2013-10-20', 'Oct 5 - 20, 2013'),
            array('en', '2013-10-05', '2013-11-20', 'Oct 5 - Nov 20, 2013'),
            array('en', '2012-10-05', '2013-10-20', 'Oct 5, 2012 - Oct 20, 2013'),
            array('de', '2012-10-05', '2012-10-20', '05 - 20.10.2012'),
            array('de', '2012-10-05', '2012-11-20', '05.10 - 20.11.2012'),
            array('de', '2012-10-05', '2013-10-20', '05.10.2012 - 20.10.2013')
        );
    }

    /**
     * @dataProvider providerDateTimeRange
     */
    public function testDateTimeRange($language, $start, $end, $expected)
    {
        $formatter = new Ranger($language);
        $formatter->setTimeFormat(IntlDateFormatter::SHORT);
        $this->assertEquals($expected, $formatter->format($start, $end));
    }

    public function providerDateTimeRange()
    {
        return array
        (
            array('en', '2013-10-05 01:01:01', '2013-10-20 00:00:00', 'Oct 5, 2013, 1:01 AM - Oct 20, 2013, 12:00 AM'),
            array('en', '2013-10-05 10:00:01', '2013-10-05 13:30:00', 'Oct 5, 2013, 10:00 AM - 1:30 PM'),
            array('de', '2013-10-05 01:01:01', '2013-10-20 00:00:00', '05.10.2013, 01:01 - 20.10.2013, 00:00'),
            array('de', '2013-10-05 10:00:01', '2013-10-05 13:30:00', '05.10.2013, 10:00 - 13:30'),
        );
    }
}