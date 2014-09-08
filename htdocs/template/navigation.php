<?php
/**
 * accepts one level navigations
 */
?>
<select id="alternative_menu" size="1">
    <?php foreach($navigation as $key => $value) : ?>
    <option><?= $value['label'] ?></option>
    <?php endforeach; ?>
</select>
<nav>
    <h2 class="hidden">Navigation</h2>
    <ul>
    <?php foreach($navigation as $key => $value) : ?>
        <li><a href="<?= $value['href'] ?>"><?= $value['label'] ?></a></li>
    <?php endforeach; ?>
    </ul>
</nav>
