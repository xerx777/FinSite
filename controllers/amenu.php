<?
session_start();

class Controller_Amenu extends Controller_Base
{
    public $login;
    public $password;
    public $type;
    public $form;

    public function action_index()
    {
        // проверка на вход не через авторизацию
        if (!isset($_POST['type']) && !isset($_SESSION['type'])) header('Location: /');


        // получение регистрационных данных
        if (isset($_POST['login'])) $this->login = $_POST['login']; else $this->login = $_SESSION['log'];
        if (isset($_POST['password'])) $this->password = $_POST['password']; else $this->password = $_SESSION['password'];
        if (isset($_POST['type'])) $this->type = $_POST['type']; else $this->type = $_SESSION['type'];
        if (isset($_POST['form'])) $this->form = $_POST['form']; else $this->form = $_SESSION['form'];

        //защита от входа не через форму адресации
        if ($this->type == "1") {

            if ($this->login != "" && $this->password != "") {
                // Получение логина и пароля из бд
                $main_config = db::get_all("SELECT * FROM user WHERE login='$this->login'");

                if (!$main_config) {
                    $this->template_name = 'admin_auto';                          
                    $message = "<h3 style='background-color: darkorange; color: darkred; text-align: center; padding: 10px;'>Такой логин не найден</h3>";
                    print $message;
                } elseif (!password_verify($this->password, $main_config[0]['password'])) {
                    $this->template_name = 'admin_auto';                    
                    $message = "<h3 style='background-color: darkorange; color: darkred; text-align: center; padding: 10px;'>Неверный пароль</h3>";
                    print $message;
                } else {
                    $_SESSION['log'] = $this->login;
                    $_SESSION['password'] = $this->password;                    
                    $_SESSION['type'] = $this->type;
                    $_SESSION['form'] = $this->form;

                    // установка файла шаблона
                    $this->template_name = 'admin_main';
                    // установка контента
                    $content_view  = View::factory('admin_menu');
                    $this->content = $content_view;
                }
            } else {
                $this->template_name = 'admin_auto';  
                $message = "<h3 style='background-color: darkorange; color: darkred; text-align: center; padding: 10px;'>Не все поля заполнены!!!</h3>";
                print $message;
            }
        }
        else{
            $this->template_name = 'admin_auto';
                //print "непоняточка";        
        }
    }
}
