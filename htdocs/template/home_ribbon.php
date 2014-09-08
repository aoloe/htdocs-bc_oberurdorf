<section id="spacer">  
    <h2 class="hidden">Nächste Trainings</h2>          
    <p>
    <?php foreach ($ribbon as $item) : ?>
    <span class="date_circle<?= $item['no_training'] ? ' date_circle_no' : '' ?> "><span class="date_day"><?= $item['day'] ?></span><span class="date_month"><?= $item['month'] ?></span></span>
    <span class="date_text"><?= $item['title'] ?></span>
    <?php endforeach; ?>
    </p>
</section>
