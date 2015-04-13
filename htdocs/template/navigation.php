<?php
/**
 * accepts one level navigations
 */
?>
<style>
@media screen and (max-width:61.5em) {
    body {
        /* background-color:lightblue; */
    }
    nav ul li {
        display:block;
        float: left;
    }
    nav ul li a {
        text-transform: none;
        font-size: 90%;
    }

}

/* @media screen and (max-width:38em){ */
@media screen and (max-width:765px){
    body {
        /* background-color:orange; */
    }
    header p a img
    {
        display:none;
    }

    /* a.l.e: i had to remove the "header nav" definitino from style.css to get it to work ok */
    header nav {
        display:block;
    }
    nav ul li {
        display:block;
        float: left;
    }
    nav ul li a {
        text-transform: none;
        font-size: 90%;
    }

}
</style>

<!--
<label for="navigation-responsive-button" id="navigation-responsive-label">≡</label>
<input type="checkbox" id="navigation-responsive-button">
-->
<nav>
    <h2 class="hidden">Navigation</h2>
    <ul>
    <?php foreach($navigation as $key => $value) : ?>
        <li><a href="<?= $value['href'] ?>"><?= $value['label'] ?></a></li>
    <?php endforeach; ?>
    </ul>
</nav>
