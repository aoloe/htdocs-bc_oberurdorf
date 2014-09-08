<section id="text_columns" class="clearfix">
<h2>Nächste Termine</h2>
<ul>
<?php foreach ($event as $item) : ?>
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
