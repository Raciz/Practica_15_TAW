<!-- Left Menu Start -->
<ul class="metisMenu nav" id="side-menu">
    <?php
    //verificamos que tipo de usuario es
    if($_SESSION["tipo"]=="Administrator")
    {
    ?>
    <!--si es administrador mostramos estas opciones-->
    <li><a href="index.php?section=dashboard"><i class="ti-home"></i> Dashboard </a></li>
    <li><a href="index.php?section=users&action=list"><i class="mdi mdi-account-circle"></i> Users </a></li>
    <li><a href="index.php?section=groups&action=list"><i class="mdi mdi-account-multiple"></i> Groups </a></li>
    <li><a href="index.php?section=careers&action=list"><i class="fa fa-user"></i> Careers </a></li>
    <li><a href="index.php?section=students&action=list"><i class="fa fa-user"></i> Students </a></li>
    <li><a href="index.php?section=activities&action=list"><i class="mdi mdi-brush"></i> Activities </a></li>
    <li><a href="index.php?section=units&action=list"><i class="fa fa-folder"></i> Units </a></li>
    <?php
    }
    else if($_SESSION["tipo"]=="Teacher")
    {
    ?>
    <!-- y si es teacher mostramos esta opcione-->
    <li><a href="index.php?section=groups&action=my-groups"><i class="ti-home"></i>Dashboard</a></li>
    <?php
    }
    ?>
</ul>
