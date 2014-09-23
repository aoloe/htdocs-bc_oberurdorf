BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:Trainings beim BC-Oberurdorf
X-WR-TIMEZONE:UTC
X-WR-CALDESC:Trainings beim BC-Oberurdorf
<?php foreach ($event as $item) : ?>

BEGIN:VEVENT
DTSTART:<?= $item['start'] ?>

DTEND:<?= $item['end'] ?>

UID:<?= $item['id'] ?>

DTSTAMP:<?= $item['timestamp'] ?>

LOCATION:<?= $item['location'] ?>

DESCRIPTION:<?= $item['description'] ?>

URL;VALUE=URI:<?= $item['url'] ?>

SUMMARY:<?= $item['summary'] ?>

END:VEVENT
<?php endforeach ?>

END:VCALENDAR
