// html список товаров
function readProductsTemplate(data, keywords) {

  var read_products_html = `<div id="news">`;

  // перебор возвращаемого списка данных
  $.each(data.records, function(key, val) {
    // создание новой строки таблицы для каждой записи
    read_products_html +=
        `<a href="/news/article/` + val.id +
        ` " class='news-item' data-id='` + val.id + `'>
                    <img class="news-image" src="` + val.image + `" alt=""></img>
                    <div class="news-date">` + val.created + `</div>
                    <div class="news-caption">` + val.caption + `</div>
            </a>`;
  });
  read_products_html += `</div>`;

  // добавим в «page-content» нашего приложения
  $('#page-content').html(read_products_html);
}