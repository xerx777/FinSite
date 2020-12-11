<div class="wrapper page-content">
    <!--левая панель и меню -->
    <?php include "aside.php" ?>
    <!--Центральный блок-->
    <div class="center-block">
        <!--хлебные крошки -->
        <div class="row">
            <div class="coll-6 offset-6">
                <ul class="list-inline list-unstyled text-secondary">
                    <li class="list-inline-item bread"><a href="/"><em><small>Главная ></small></em></a></li>
                    <li class="list-inline-item bread"><em><small>Бухгалтерский учет</small></em></li>
                </ul>
            </div>
        </div>
        <!--контент -->
        <div class="wrapper flex-box">
            <!--меню плитка-->
            <div class="box-bricks full">
                <div class="item"><a href="#c1">Ведение бухгалтерского учета</a></div>
                <div class="item"><a href="#c2">Внутренний аудит</a></div>
                <div class="item"><a href="#c3">Автоматизация учета</a></div>
                <div class="item"><a href="#c4">Учетная политика</a></div>
            </div>
            <!--статья -->
        </div>
        <div class="wrapper">
            <p><?= $article ?></p>
        </div>
    </div>
    <!--правая панель -->
    <?php include "right-block.php" ?>
</div>

<script src="/scripts/scroll-to-anchor.js"></script>



