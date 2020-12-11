<header>

    <nav class="fixed-top " data-toggle="affix">
        <div class="wrapper flex-box top-menu">

            <div>
                <!-- логотип -->
                <a href="/" class="flex-box logo">
                    <img class="logo-img" src="/images/logo.jpg">
                    <div class="logo-text">MasterConsult</div>
                </a>
            </div>

            <div>
                <div class="navbar navbar-light bg-white navbar-expand-md pt-3 pb-0 align-items-start"
                     id="first" style="padding-bottom: 0">


                    <a class="navbar-toggler p-2 text-black border-0"
                       data-toggle="collapse"
                       data-target=".navbar-collapse">☰</a>

                    <div class="navbar-collapse collapse justify-content-end">
                        <ul class="nav navbar-nav">
                            <li class="nav-item "><a href="tel:+79506219201">
                                    <img src="/images/phone.png" alt="tel">+7-(495)-668-63-64</a>
                            </li>
                            <li class="nav-item"><a
                                        href="mailto:neo-zenon@mail.ru">
                                    <img src="/images/email.png"
                                         alt="post">
                                    info@svn-555.ru.ru </a>
                            </li>
                            <!--                            <li class="nav-item"><a href=""> <img-->
                            <!--                                            src="/images/whatsapp.png"-->
                            <!--                                            alt="whatsapp">-->
                            <!--                                    89269475915 </a>-->
                            <!--                            </li>-->
                        </ul>
                    </div>
                </div>
                <div class="navbar navbar-light bg-white navbar-expand-sm pt-0 justify-content-end"
                     id="second">
                    <ul class="navbar-nav d-flex flex-wrap">
                        <li class="nav-item"><a class="nav-link"
                                                href="/">Главная</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Услуги</a>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="/services/accounting">Бухучет</a>
                                <a class="dropdown-item" href="/services/personnel">Кадры</a>
                                <a class="dropdown-item" href="/services/justice">Юриcт</a>
                                <a class="dropdown-item" href="/services/consulting">Консалт</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                                href="/news">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">О
                                нас</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                                href="/contacts">Контакты</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div id="button-up"><img src="/images/up3.png"></div>

    <script src="/scripts/button-up-handler.js"></script>

    <!-- Код модального окна запроса коммерческого предложения, скрыто и появляется при нажатии на кнопку -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog text-form" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Бесплатная консультация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contactForm" action="handler.php" method="post">
                        <div class="form-group">
                            <label for="name">Ваше имя:</label>
                            <input id="name" class="form-control" name="name" required type="text"
                                   placeholder="Иванов Иван Иванович">
                        </div>
                        <div class="form-group">
                            <label for="phone">Ваш телефон:</label>
                            <input id="phone" class="form-control" name="phone" type="text"
                                   placeholder="+7 (800) 000-00-00">
                        </div>
                        <div class="form-group">
                            <label for="message">Пожалуйста, укажите тему вопроса:</label>
                            <textarea id="message" class="form-control" required name="message" rows="4"></textarea>
                        </div>
                        <div class="form-group form-check">
                            <input id="check" class="form-check-input" checked type="checkbox">
                            <label class="form-check-label" for="check">Я добровольно отправляю свои данные</label>
                        </div>
                        <button id="button" class="btn btn-info" type="submit">Заказать консультацию</button>
                        <div class="result">
                            <span id="answer"></span>
                            <span id="loader" style="display:none"><img src="images/loader.gif" alt=""></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- конец кода модального окна запроса коммерческого предложения -->


</header>
