<?
session_start();

/**
 * Контроллер страницы добавления статьи
 */
class Controller_Aadd extends Controller_Base
{
    public $login;
    public $form;
    public $coment;

    public function action_index()
    {
        // проверка на вход не через авторизацию
        if (!isset($_SESSION['log'])) header('Location: /');

        // установка файла шаблона
        $this->template_name = 'admin_main';

        // установка переменных сессии
        $this->login = $_SESSION['log'];
        $this->form = $_SESSION['form'];

        // проверка входа
        if (isset($this->login) and isset($this->form)) {

            // добавление статьи в БД
            if (isset($_POST['act']) && $_POST['act'] == 'addcomment') {

                // Получение названия страницы и содержимого из бд
                $main_config = db::query("INSERT INTO news (image, caption, content) VALUES ('$_POST[link]', '$_POST[caption]', '$_POST[content]')");
                // проверка
                if ($main_config) {
                    $this->coment = "<b>Статья успешно опубликована!</b>";
                } else {
                    $this->coment = "<b>Что-то пошло не так!</b>";
                }
            }
            // установка контента
            $content_view = View::factory('admin_add', ['article' => $this->coment]);
            $this->content = $content_view;
        }
    }
}