jQuery(function($) {
  // показать список товаров при первой загрузке
  showProductsFirstPage();
  // когда была нажата кнопка «Все товары»
  $(document).on('click', '.read-products-button', function() {
    showProductsFirstPage();
  });

  // когда была нажата кнопка «страница»
  $(document).on('click', '.pagination li', function() {
    // получаем json url
    var json_url = $(this).find('a').attr('data-page');

    // покажем список товаров
    showProducts(json_url);
  });
});

//-------------------------------------
// отображает все новости
function showProductsFirstPage() {
  var json_url = 'http://buh/api/read_paging.php';
  showProducts(json_url);
}

// функция для отображения списка новостей 
function showProducts(json_url) {

  // получаем список товаров из API
  $.getJSON(json_url, function(data) {

    // HTML для перечисления товаров
    readProductsTemplate(data, '');
  });
}