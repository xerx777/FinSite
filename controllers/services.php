<?

/**
 * Контроллер главной страницы
 */
class Controller_Services extends Controller_Base
{

    public function action_accounting()
    {
        // установка файла шаблона
        $this->template_name = 'main';
        // Получение названия страницы и содержимого из бд
        $main_config = db::get_all(
            "SELECT header, article FROM pages WHERE category = 'accounting'"
        );
        // установка значения названия страницы
        View::set_global('title', $main_config[0]['header']);
        // установка контента
        $content_view = View::factory(
            'accounting', ['article' => $main_config[0]['article']]
        );
        $this->content = $content_view;
    }

    public function action_personnel()
    {
        // установка файла шаблона        $this->template_name = 'main';
        $this->template_name = 'main';
        // Получение названия страницы и содержимого из бд
        $main_config = db::get_all(
            "SELECT header, article FROM pages WHERE category = 'personnel'"
        );
        // установка значения названия страницы
        View::set_global('title', $main_config[0]['header']);
        // установка контента
        $content_view = View::factory(
            'personnel', ['article' => $main_config[0]['article']]
        );
        $this->content = $content_view;
    }

    public function action_justice()
    {
        // установка файла шаблона
        $this->template_name = 'main';
        // Получение названия страницы и содержимого из бд
        $main_config = db::get_all(
            "SELECT header, article FROM pages WHERE category = 'justice'"
        );
        // установка значения названия страницы
        View::set_global('title', $main_config[0]['header']);
        // установка контента
        $content_view = View::factory(
            'justice', ['article' => $main_config[0]['article']]
        );
        $this->content = $content_view;
    }

    public function action_consulting()
    {
        // установка файла шаблона
        $this->template_name = 'main';
        // Получение названия страницы и содержимого из бд
        $main_config = db::get_all(
            "SELECT header, article FROM pages WHERE category = 'consulting'"
        );
        // установка значения названия страницы
        View::set_global('title', $main_config[0]['header']);
        // установка контента
        $content_view = View::factory(
            'consulting', ['article' => $main_config[0]['article']]
        );
        $this->content = $content_view;
    }

}

