<section id="text_columns" class="clearfix">
<h2>Nächste Termine</h2>
<?php
$item = reset($event);
$year = $item['year'];
$month = $item['month'];
?>
<ul>
<?php foreach ($event as $item) : ?>
<?php if ($item['year'] != $year) : ?>
<h3><?= $year = $item['year']; $month = ''; ?></h3>
<?php endif; ?>
<?php if ($item['month'] != $month) : ?>
<h3><?= $month = $item['month']; ?></h3>
<?php endif; ?>
<li><?= $item['day'].'. '.$item['month'] ?>: <?=$item['title'] ?></li>
<?php endforeach; ?>
</ul>

<h2>Vergangene Anlässe</h2>

<ul>
<?php foreach ($event_past as $item) : ?>
<li><?= $item['day'].'. '.$item['month'] ?> <?= $item['title'] ?></li>
<?php endforeach; ?>
</ul>
</section>
