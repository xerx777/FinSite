<?

class Controller_Admin extends Controller_Base
{

    public function action_index()
    {
        // установка файла шаблона
        $this->template_name = 'admin_auto';
    }
}
