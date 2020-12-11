<?
session_start();
/**
 * Контроллер страницы редактирования статьи новостей
 */
class Controller_Achangecontent extends Controller_Base
{
    public $login;
    public $form;

    public function action_index($params)
    {

        // проверка на вход не через авторизацию
        if (!isset($_SESSION['log'])) header('Location: /');
        
        // установка файла шаблона
        $this->template_name = 'admin_main';

        // установка переменных сессии
        $this->login = $_SESSION['log'];
        $this->form = $_SESSION['form'];

        // проверка входа
        if (isset($this->login) AND isset($this->form)) {

        // изменение 
        if (isset($_POST['change']) && $_POST['change'] == 'change') {
            
        
	    // изменение  в бд
        $rtt = db::query("UPDATE pages SET header='$_POST[header]', article='$_POST[article]' WHERE category='$params'");
    	
        }

        // Получение содержимого из бд
        $main_config = db::get_all("SELECT * FROM pages WHERE category = '$params'");

        // установка контента
        $content_view = View::factory('admin_change_content', ['article' => $main_config[0]['header'], 'content' => $main_config[0]['article'], 'category' => $main_config[0]['category']]);
         $this->content = $content_view;
        }
    }
}
