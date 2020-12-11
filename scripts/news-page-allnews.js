// html список товаров 
function readProductsTemplate(data, keywords) {

  var read_products_html = `<div id="news">`;

  // перебор возвращаемого списка данных
  $.each(data.records, function(key, val) {
    // создание новой строки таблицы для каждой записи
    read_products_html +=
        `<a href="/news/article/` + val.id +
        ` " class='news-item column-2' data-id='` + val.id + `'>
                    <img class="news-image" src="` + val.image + `" alt=""></img>
                    <div class="news-date">` + val.created + `</div>
                    <div class="news-caption">` + val.caption + `</div>
            </a>`;
  });
  read_products_html += `</div>`;

  // pagination
  if (data.paging) {
    read_products_html += `<ul class='pagination'>`;

    // первая
    if (data.paging.first != '') {
      read_products_html += `<li class='page-item'><a class='page-link' data-page='` +
          data.paging.first + `'>Первая страница</a></li>`;
    }

    // перебор страниц
    $.each(data.paging['pages'], function(key, val) {
      var active_page = val.current_page == 'yes' ? 'class=\'active\'' : '';
      read_products_html += '<li class=\'page-item\'' + active_page +
          '><a class=\'page-link\' data-page=\'' + val.url + '\'>' + val.page +
          '</a></li>';
    });

    // последняя
    if (data.paging.last != '') {
      read_products_html += '<li class=\'page-item\'><a class=\'page-link\' data-page=\'' +
          data.paging.last + '\'>Последняя страница</a></li>';
    }
    read_products_html += '</ul>';
  }

  // добавим в «page-content» нашего приложения
  $('#page-content').html(read_products_html);
}