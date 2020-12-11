<div class="wrapper page-content">

    <?php include "aside.php" ?>

    <div class="center-block">

        <!--хлебные крошки -->
        <div class="row">
            <div class="coll-6 offset-6">
                <ul class="list-inline list-unstyled text-secondary">
                    <li class="list-inline-item bread"><a href="/"><em><small>Главная ></small></em></a></li>
                    <li class="list-inline-item bread"><em><small>Консалтинг</small></em></li>
                </ul>
            </div>
        </div>

        <!--Центральный блок-->
        <div class="wrapper flex-box">

            <!--меню плитка-->
            <div class="box-bricks full">
                <div class="item"><a href="#c1">Управленческий консалтинг</a></div>
                <div class="item"><a href="#c2">Финансовый консалтинг</a></div>
                <div class="item"><a href="#c3">Бухгалтерский консалтинг</a></div>
                <div class="item"><a href="#c4">Юридический консалтинг</a></div>
                <div class="item"><a href="#c5">Кадровый консалтинг</a></div>
            </div>

        </div>

        <div class="wrapper">
            <p><?= $article ?></p>
        </div>
    </div>

    <?php include "right-block.php" ?>
</div>

<script src="/scripts/scroll-to-anchor.js"></script>
