BEGIN:VCALENDAR
X-WR-CALNAME:Trainings beim BC-Oberurdorf
X-WR-TIMEZONE:UTC
X-WR-CALDESC:Trainings beim BC-Oberurdorf
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
<?php foreach ($event as $item) : ?>
BEGIN:VEVENT
DTEND:<?= $item['end'] ?>

UID:<?= $item['id'] ?>

DTSTAMP:<?= $item['timestamp'] ?>

LOCATION:<?= $item['location'] ?>

DESCRIPTION:<?= $item['description'] ?>

URL;VALUE=URI:<?= $item['url'] ?>

SUMMARY:<?= $item['summary'] ?>

DTSTART:<?= $item['start'] ?>

END:VEVENT
<?php endforeach ?>
END:VCALENDAR
