<section id="text_columns" class="clearfix">
        <h2 class="hidden">Blindtext</h2>
        <article class="column1">
        <?= $content ?>
    </article>
    <?php if (isset($sidebar)) : ?>
    <section class="column2">
        <h3 class="hidden">Lorem Impsum</h3>
        <?= $sidebar ?>
    </section>
    <?php endif; ?>
</section>
    <br class="clear"/>
</section>
