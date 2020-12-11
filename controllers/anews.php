<?
session_start();
/**
 * Контроллер дминки страница новостей
 */
class Controller_Anews extends Controller_Base
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
        $this->login    = $_SESSION['log'];
        $this->form     = $_SESSION['form'];
        $this->password = $_SESSION['password'];
        $this->type     = $_SESSION['type'];

        // проверка входа
        if (isset($this->login) and isset($this->form)) {

            // Удалить статью
            if (isset($_GET['type']) and $_GET['type'] == 2) {
                $q = db::query("DELETE FROM news WHERE id=$_GET[id_news]");
            }

            //количество выводимых статей
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $kol = 5;
            $art = ($page * $kol) - $kol;

            // Получение содержимого из бд
            $main_config = db::get_all("SELECT * FROM news ORDER BY created DESC LIMIT $art, $kol");

            $data = '';
            foreach ($main_config as $row) {
                $data .= '<tr>

                            <td width=20%><image src='.$row['image'].'></td>


                            <td width=80%><h3>'.$row['caption'].'</h3><h3>'.date("d-m-Y", strtotime($row['created'])).'</h3><p>'.$row['content'].'</p></td>
                            <td align=center>
                            <button><a href=/achange?id_news=' . $row['id'] . '>Редактировать</a></button>
                            <br>
                            <br>
                            <button><a href=/anews?type=2&id_news=' . $row['id'] . '>Удалить</a></button>
                            </td>
                        </tr>';
            }

            // Пагинация
            $pagin    = db::get_all("SELECT COUNT(*) as count FROM news");
            $str_page = ceil($pagin[0]['count'] / $kol);

            // установка контента
            $content_view  = View::factory('admin_news', ['article' => $data, 'str_page' => $str_page]);
            $this->content = $content_view;
        }

        //$_SESSION['log'] = $this->login;
        //$_SESSION['password'] = $this->password;
        //$_SESSION['type'] = $this->type;
        //$_SESSION['form'] = $this->form;
    }
}
