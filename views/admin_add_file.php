<div class="wrapper">

<h2>Загрузить файл с изменениями законодательства</h2>
<hr>
<p>Порядок загрузки файлов</p>
<ul>
	<li>1. Открыть менеджер файлов</li>
	<li>2. В менеджере файлов произвести загрузку файла на хостинг</li>
	<li>3. В менеджере файлов выбрать загруженный файл</li>
	<li>4. После появления пути к выбранному файлу нажать кнопку "загрузить файл" </li>
</ul>
<br>
<form action="/aaddfile" method="post">
<label>
<a href="/filemanager/dialog.php?relative_url=2&type=0&field_id=file-input" class="iframe-btn" type="button">открыть менеджер файлов</a>
<input type="text" name="link" id="file-input"></label>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha256-yt2kYMy0w8AbtF89WXb2P1rfjcP/HTHLT7097U8Y5b8=" crossorigin="anonymous"></script>

<script>
$('.iframe-btn').fancybox({
  'width'     : 900,
  'height'    : 600,
  'type'      : 'iframe',
  'autoScale' : true
});
function responsive_filemanager_callback(field_id){
  var url=jQuery('#'+field_id).val();
}
</script>

<input type="hidden" value="addfile" name="file">
<input type="submit" value="Загрузить файл">

</div>