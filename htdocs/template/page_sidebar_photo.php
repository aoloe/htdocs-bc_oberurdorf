<article class="row row_image">
    <h4 class="hidden">Dolor sit</h4>                  
    <p><img src="<?= $image ?>" width="300" alt="<?= isset($alt) ? $alt : '' ?>"/><br />
    <?php if (isset($caption)) : ?>
    <?= $caption ?>
    <?php endif; ?>
    </p>
</article> 

