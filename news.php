<?

/**
 * Контроллер главной страницы
 */
class Controller_News extends Controller_Base
{
    /**
     * @param $params
     */
    public function action_index()
    {
        // установка файла шаблона
        $this->template_name = 'main';
        // Получение названия страницы и содержимого из бд
        $main_config = db::get_all("SELECT header, article FROM pages WHERE category = 'news'");
        // установка значения названия страницы
        View::set_global('title', $main_config[0]['header']);
        // установка контента
        $content_view = View::factory('news');
        $this->content = $content_view;
    }

    /**
     * @param $params
     */
    public function action_article($params)
    {
        // установка файла шаблона
        $this->template_name = 'main';
        // Получение названия страницы и содержимого из бд
        $main_config = db::get_all("SELECT header, article FROM pages WHERE category = 'news'");
        // установка значения названия страницы
        View::set_global('title', $main_config[0]['header']);
        // Получение содержимого из бд
        $main_config = db::get_all("SELECT * FROM news WHERE id='$params'");
        // установка контента
        $content_view = View::factory('article', ['image' => $main_config[0]['image'], 'caption' => $main_config[0]['caption'], 'content' => $main_config[0]['content'], 'created' => date('d-m-Y', strtotime($main_config[0]['created']))]);
        $this->content = $content_view;
    }

}
?>