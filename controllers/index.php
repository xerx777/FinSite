<?
/**
 * Контроллер главной страницы
 */
class Controller_Index extends Controller_Base
{
    public function action_index()
    {
        // установка файла шаблона
        $this->template_name = 'main';

	    // Получение значения названия страницы из бд
    	$main_config = db::get_all('SELECT header FROM pages WHERE category = "home"');

    	// установка значения названия страницы
    	View::set_global('title', $main_config[0]['header']);

        // получение данных крайнего файла обзора изменений из БД
        $file = db::get_all('SELECT * FROM file ORDER BY file_date DESC LIMIT 1');

        // установка контента
        $content_view  = View::factory('home', ['lastDate' => date("d-m-Y",strtotime($file[0]['file_date'])), 'pathFile' => $file[0]['file_name'] ]);
        $this->content = $content_view;
    }
}
