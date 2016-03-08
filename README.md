# Ranger [![Build Status](https://travis-ci.org/flack/ranger.svg?branch=master)](https://travis-ci.org/flack/ranger)
Ranger is a formatter for date and time ranges, based (somewhat loosely) on Adam Shaw's `formatRange` algorithm in [fullCalendar](https://github.com/fullcalendar/fullcalendar).

## Some Examples

```php
use OpenPsa\Ranger\Ranger;

$ranger = new Ranger('en');
echo $ranger->format('2013-10-05', '2013-10-20');
// Oct 5 - 20, 2013
echo $ranger->format('2013-10-05', '2013-11-20');
// Oct 5 - Nov 20, 2013

$ranger = new Ranger('en_GB');
echo $ranger->format('2013-10-05', '2013-10-20');
// 5 - 20 Oct 2013
echo $ranger->format('2013-10-05', '2013-11-20');
// 5 Oct - 20 Nov 2013

$ranger = new Ranger('de');
echo $ranger->format('2013-10-05', '2013-10-20');
// 05 - 20.10.2013
echo $ranger->format('2013-10-05', '2013-11-20');
// 05.10 - 20.11.2013
```
