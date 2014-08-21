<?php
    /** @var array $config */
    include __DIR__ . '/../config/mainMenu.php';

    $currentPage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
    $currentPage = strtolower($currentPage);
?>

<nav class="navbar navbar-default header" role="navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="logo-holder">
                    <h2>Grafik und Illustration </h2>
                    <h5>
                        Marlene Brüggemann
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid navbar-holder">
        <!-- Titel und Schalter werden für eine bessere mobile Ansicht zusammengefasst -->
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navigation ein-/ausblenden</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php

                $currentpage = basename($_SERVER['PHP_SELF']);

                ?>

                <?php foreach($config['main_menu']['items'] AS $identifier => $item ):?>
                    <li class="<?php echo $identifier == $currentPage ? 'active' : ''?>">
                        <a href="<?php echo $item['link']?>">
                            <?php echo $item['label']?>
                        </a>
                    </li>
                <?php endforeach; ?>

             </ul>

            <ul class="nav navbar-nav navbar-right">



                <?php foreach($config['side_menu']['items'] AS $identifier => $item ):?>
                <li class="<?php echo $identifier == $currentPage ? 'active' : ''?>">
                    <a href="<?php echo $item['link']?>">
                        <?php echo $item['label']?>

                    </a>
                </li>
                <?php endforeach; ?>


            </ul>
        </div>
    </div>
</nav>