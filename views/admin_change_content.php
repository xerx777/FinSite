<div class="wrapper">
	<h2>Редактировать раздел сайта</h2>
	<hr>
	<script src="/ckeditor/ckeditor.js"></script>

	<form action="/achangecontent/index/<?=$category?>" method="post">
		<label>
			<span>Заголовок страницы</span>
			<input type="text" name="header" maxlength="100" style="width: 500px" value="<?=$article?>"></label>
		<label>
		<br><br>
		<textarea name="article" id="content" rows="5" cols="150" 	maxlength="500"><?=$content?></textarea>
		<br>
		<script>
        CKEDITOR.replace( 'content', {
      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
	  } );
      </script>
      	<input type="hidden" value="<?=$category?>" name="category">
		<input type="hidden" value="change" name="change">
		<input type="submit" value="Опубликовать измененный контент">
	</form>
</div>