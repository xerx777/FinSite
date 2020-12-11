<?
session_start();
/**
 * Контроллер страницы добавления статьи
 */
class Controller_Aaddfile extends Controller_Base
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
        $this->password = $_SESSION['password'];
        $this->type = $_SESSION['type'];

        // проверка входа
        if (isset($this->login) AND isset($this->form)) {

        // добавление статьи в БД
        if (isset($_POST['file']) && $_POST['file'] == 'addfile') {

	    // Пзапись ссылки на файл в бд
        $main_config = db::query("INSERT INTO file (file_name) VALUES ('$_POST[link]')");
        // проверка
        if ($main_config) {
            $this->coment = "<b>Файл загружен!</b>";
        } else {
            $this->coment = "<b>Файл не загружен!</b>";
        }
	
        }
        // установка контента
        $content_view = View::factory('admin_add_file', ['article' => $this->coment]);
            $this->content = $content_view;
        }
                    //$_SESSION['log'] = $this->login;
                    //$_SESSION['password'] = $this->password;
                    //$_SESSION['type'] = $this->type;
                    //$_SESSION['form'] = $this->form;
    }
}