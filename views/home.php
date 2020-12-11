<!--Центральный блок-->
<div class="wrapper flex-box">

    <!--Блок со слайдером-->
    <div id="myCarousel" class="carousel slide bg-inverse ml-auto mr-auto"
         data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <h2>Акция для владельцев
                    автобизнеса</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quidem iusto ex deserunt, numquam dolor reiciendis molestiae
                </p>
                <a href="/" class="button carousel-button">Подробнее</a>
            </div>
            <div class="carousel-item">
                <h2>Партнерство с компанией Альфа центр</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                    cum ipsam excepturi quasi quis ipsum nemo!
                    Magni quia, qui.</p>
                <a href="/" class="button carousel-button">Подробнее</a>
            </div>
        </div>
    </div>

    <!--меню плитка-->
    <div class="box-bricks">
        <div class="item"><a href="/services/accounting">Бухгалтерский учет</a>
        </div>
        <div class="item"><a href="/services/personnel">Кадровый учет</a></div>
        <div class="item"><a href="/services/consulting">Консалтинг</a></div>
        <div class="item"><a href="/services/justice">Юридическое
                обслуживание</a></div>
        <div class="item"><a href="/news">Новости</a></div>
    </div>

</div>

<!--Блок новостей-->
<div class="wrapper">
    <div id="articles"></div>
</div>
<div class="wrapper">
    <button class="show-more-news">добавить еще новостей</button>
</div>

<div class="service">
    <div class="wrapper flex-box">
        <!--Изменения в законодательстве-->
        <div class="law-changes">
            <div class="monitoring-head flex-box">
                <div>Мониторинг</div>
<!--                <a href='' class="">Предыдущие выпуски...</a>-->
            </div>
            <div class="monitoring flex-box">
                <div>Обзор изменений в законодательстве по состоянию
                    на <?= $lastDate ?> г.
                </div>
                <a href='<?= $pathFile ?>' download>
                    <div>Скачать</div>
                    <div class="fff">
                        <img src="/images/dload.png" alt="">
                    </div>
                </a>
                <a href='<?= $pathFile ?>' target="_blank">
                    <div>Читать</div>
                    <div class="fff">
                    <img src="/images/read.png" alt="">
                    </div>
                </a>
            </div>
        </div>

        <!--Запрос коммерческого предложения-->
        <div class="feedback">
            <p>Менеджеры компании с радостью ответят на ваши вопросы, произведут
                расчет стоимости услуг и подготовят коммерческое
                предложение.</p>
            <div class="button offer-button" data-toggle="modal"
                    data-target="#exampleModal">запросить коммерческое
                предложение
            </div>
        </div>
    </div>
</div>

<script src="/scripts/app.js"></script>
<script src="/scripts/home-page-allnews.js"></script>
<script src="/scripts/read-all-articles.js"></script>
<script src="/scripts/home-page-addnewsbutton-handler.js"></script>

<!-- Обработчики ФОС -->
<!-- 1. Маска для номера телефона -->
<script src="/scripts/jquery.maskedinput.min.js"></script>
<!-- 2. Инициализация и Ajax-запрос -->
<script src="/scripts/callback-handler.js"></script>