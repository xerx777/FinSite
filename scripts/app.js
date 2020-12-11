jQuery(function($) {

  // HTML приложения
  var app_html = `
            <h1>Новости компании</h1>
            <!-- здесь будет показано содержимое -->
            <div id='page-content'></div>`;

  // вставка кода на страницу
  $('#articles').html(app_html);

});

// функция для создания значений формы в формате json
$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};