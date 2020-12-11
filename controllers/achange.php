<?
session_start();
/**
 * Контроллер страницы редактирования статьи новостей
 */
class Controller_Achange extends Controller_Base
{
    public $login;
    public $form;

    public function action_index()
    {
        // проверка на вход не через авторизацию
        if (!isset($_SESSION['log'])) {
            header('Location: /');
        }

        // установка файла шаблона
        $this->template_name = 'admin_main';

        // установка переменных сессии
        $this->login = $_SESSION['log'];
        $this->form  = $_SESSION['form'];

        // проверка входа
        if (isset($this->login) and isset($this->form)) {

            // изменение статьи
            if (isset($_POST['change']) && $_POST['change'] == 'change') {

                // изменение статьи в бд
                $rtt = db::query("UPDATE news SET image='$_POST[link]', caption='$_POST[caption1]', content='$_POST[content1]' WHERE id=$_POST[id_news]");
            }


            // Получение содержимого из бд
            $main_config = db::get_all("SELECT * FROM news WHERE id=$_GET[id_news]");

            // установка контента
            $content_view  = View::factory('admin_change', ['article' => $main_config[0]['caption'], 'content' => $main_config[0]['content'], 'hidden' => $main_config[0]['id']]);
            $this->content = $content_view;
        }
    }
}
