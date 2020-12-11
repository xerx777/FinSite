<?

/**
 * Контроллер главной страницы
 */
class Controller_Contacts extends Controller_Base
{

    public function action_index()
    {

        // установка файла шаблона
        $this->template_name = 'main';

	    // Получение названия страницы и содержимого из бд
        $main_config = db::get_all("SELECT header, article FROM pages WHERE category = 'contacts'");
    	// установка значения названия страницы
    	View::set_global('title', $main_config[0]['header']);

        // установка контента
        $content_view = View::factory('contacts', ['article' => $main_config[0]['article']]);
            $this->content = $content_view;
    }
}
