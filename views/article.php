<div class="wrapper page-content">

    <?php include "aside.php" ?>

    <div class="center-block">

        <!--хлебные крошки -->
        <div class="row">
            <div class="coll-6 offset-0">
                <ul class="list-inline list-unstyled text-secondary">
                    <li class="list-inline-item bread"><a href="/"><em><small>Главная ></small></em></a></li>
                    <li class="list-inline-item bread">
                        <a href="/news"><em><small>Новости ></small></em></a></li>
                    <li class="list-inline-item bread">
                        <em><small><?= mb_strimwidth($caption, 0, 45, "...") ?></small></em></li>
                </ul>
            </div>
        </div>

        <!--Блок новостей-->
        <div class="news">
            <img class = "article-img" src=<?= $image ?>></img><br>
            <?= $caption ?><br>
            <?= $content ?><br>
            <?= $created ?>
            <div><a href="/news/">все новости</a></div>
        </div>

    </div>

    <?php include "right-block.php" ?>
</div>


<script src="/scripts/app.js"></script>
<script src="/scripts/news-page-allnews.js"></script>
<script src="/scripts/read-all-articles.js"></script>




