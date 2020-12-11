jQuery(function($) {

  var id = 6;
  // обрабатываем нажатие кнопки «Просмотр товара»
  $(document).on('click', '.show-more-news', function() {
    // get product id
    // чтение записи товара на основе данного идентификатора
    $.getJSON('http://buh/api/nat.php?id=' + id, function(data) {
      let nat_one_product_html = '';
      $.each(data.records, function(key, val) {
        // создание новой строки таблицы для каждой записи
        nat_one_product_html += `
            <a href="/news/content/` + val.id +
            `" class='news-item read-one-product-button' data-id='` + val.id + `'>
            <img class="news-image" src="` + val.image + `" alt="">
            </img><div>` + val.created + `</div>
            <div>` + val.caption + `</div>
            </a>`;
      });
      nat_one_product_html += `</div>`;

      // добавление html в «page-content» нашего приложения
      $('#news').append(nat_one_product_html);
      id += 3;
    });
  });

});