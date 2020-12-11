<div class="wrapper">
	<h2>Редактировать статью</h2>
	<hr>

		<script src="/ckeditor/ckeditor.js"></script>

		<form action="/achange?id_news=<?print $_GET['id_news'];?>" method="post">
		<label>Заголовок
		<input type="text" name="caption1" maxlength="100" style="width: 500px" value="<?=$article?>"></label><br>
		<label>
		<br>
		
		<p>Заменить изображение для статьи (картинка должна иметь соотношение 1:2, минимальный размер 600х300 пикселей):</p>
        <p>
            <a href="/filemanager/dialog.php?relative_url=2&type=0&field_id=file-input"
               class="iframe-btn" type="button">Выберите новое изображение</a>
            <input type="text" name="link" id="file-input"></label>
            <script src="https://code.jquery.com/jquery-latest.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
                    integrity="sha256-yt2kYMy0w8AbtF89WXb2P1rfjcP/HTHLT7097U8Y5b8="
                    crossorigin="anonymous"></script>

            <script>
              $('.iframe-btn').fancybox({
                'width': 900,
                'height': 600,
                'type': 'iframe',
                'autoScale': true,
              });

              function responsive_filemanager_callback(field_id){
                var url = jQuery('#' + field_id).val();
              }
            </script>

            <input type="hidden" value="addfile" name="file">
        </p>



		<textarea name="content1" id="content" rows="5" cols="150" 	maxlength="500"><?=$content?></textarea>
		<script>
        CKEDITOR.replace( 'content', {
      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
	  } );
    	</script>
		<input type="hidden" value="<?=$hidden?>" name="id_news">
		<input type="hidden" value="change" name="change">
		<input type="submit" value="Сохранить изменения">
		<button><a href="/anews">Вернуться к списку статей</a></button>
		</form>

</div>