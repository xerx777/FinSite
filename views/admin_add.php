<div class="wrapper">
    <script src="/ckeditor/ckeditor.js"></script>
    <h2>Добавление новой статьи</h2>
    <hr>
    <form action="/aadd" method="post">
        <label>1. Заголовок статьи
            <input type="text" name="caption" maxlength="100"
                   style="width: 75%">
        </label>
        <p>2. Загрузка изображения для статьи (картинка должна иметь соотношение 1:2, минимальный размер 600х300 пикселей)</p>
        <p>
            <a href="/filemanager/dialog.php?relative_url=2&type=0&field_id=file-input"
               class="iframe-btn" type="button">открыть менеджер файлов</a>
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
        3. Ввод содержимого статьи
        <p>
    <textarea name="content" id="content" rows="10" cols="80">
                Здесь вводим содержимое статьи
    </textarea>
            <script>
              // Replace the <textarea id="editor1"> with a CKEditor 4
              // instance, using default configuration.
              CKEDITOR.replace('content', {
                filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl: 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
              });
            </script>
        </p>
        <input type="hidden" value="addcomment" name="act">
        <input type="submit" value="Опубликовать статью">
        <button><a href="/anews">Вернуться к списку статей</a></button>
    </form>
</div>
