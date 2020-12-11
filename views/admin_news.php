<div class="wrapper">
	<h2>Редактор блока новостей</h2>
	<hr>
   	<button><a href="/aadd">Добавить новую статью</a></button>
   	<h3>
		<span>Все статьи</span>
		<span><?php for ($i = 1; $i <= $str_page; $i++) {echo "<a href=/anews?page=$i>Стр.$i.</a>";}?></span>
	</h3>

	<table border="1" width="100%" style="border-collapse: collapse;">
	<tr>
		<th>Изображение</th>
		<th>Статья</th>
		<th>Операции</th>
	</tr>
	<?=$article?>
	</table>
	<br>
</div>