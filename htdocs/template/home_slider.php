<section class="container">
    <h2 class="hidden">Lorem Ipsum</h2>
    <?php $i = 1; foreach($slider as $item) : ?>
    <article class="slider_content" id="slider_content<?= $i++ ?>">
        <h3><?= $item['title'] ?></h3>
        <?= $item['teaser'] ?>
    <?php if (array_key_exists('link', $item)) : ?>
        <a class="button" href="<?= $path.$item['link'] ?>">Mehr lesen</a>
    <?php endif; ?>
    </article>
    <?php endforeach; ?>
    <div class="slider_image" id="slides">
        <?php foreach($slider as $item) : ?>
        <img src="<?= $path.$item['image'] ?>" alt="<?= $item['title'] ?>">
        <?php endforeach; ?>
    </div>
</section>
