<?php
/**
 * accepts one level navigations
 */
?>
<style>
#navigation-responsive-label {
    /* display:none; */
}

/*Hide checkbox*/
#navigation-responsive-button {
    display: none;
    -webkit-appearance: none;
}

/* @media screen and (max-width:61.5em){ */
    /*
    header #navigation-responsive-label {
        border:0;
        width:62px;
        height:62px;
        float:right;
        margin-right:2%;
        overflow:hidden;
        display:block;
        position:relative;
        float:right;
        text-indent:-200px;
        -webkit-appearance:none;
        -webkit-tap-highlight-color:rgba(0,0,0,0);
        background:transparent
    }
    */
    header {
        height:auto;
        max-height:auto;
    }
    nav {
        position:relative;
        top:50px;
        left:0px;
        bottom:auto;
        max-height:auto;
        height:auto;
    }
    nav ul {
        max-height:auto;
        height:auto;
        left:0px;
        display:none;
        list-style-type: none;
        float:none;
    }

    nav ul li {
        float:none;
        display:block;
        background-color:blue;
    }

    nav ul li a {
        float:none;
        background-color:orange;
    }

    #navigation-responsive-label {
        text-indent:0;
        position:absolute;
        top:0;
        right:0;
        font:400 normal 28px/70px "adtile";
        color:#33302e
    }

    #navigation-responsive-button:checked ~ nav ul {
            display: block;
    }







    header #toggle.active:before{
        color:#4e4946;
        font-size:22px;
        content:"x"
    }

    header #toggle:focus,header #toggle:active{
        outline:0
    }

/* } */

@media screen and (max-width:38em){
    header #toggle{
        margin-top:-5px;
        margin-right:0
    }

    header #toggle:before{
        line-height:66px
    }

}
</style>

<label for="navigation-responsive-button" id="navigation-responsive-label">≡</label>
<input type="checkbox" id="navigation-responsive-button">
<nav>
    <h2 class="hidden">Navigation</h2>
    <ul>
    <?php foreach($navigation as $key => $value) : ?>
        <li><a href="<?= $value['href'] ?>"><?= $value['label'] ?></a></li>
    <?php endforeach; ?>
    </ul>
</nav>
