<?
session_start();
/**
 * Контроллер главной страницы
 */
class Controller_Aexit extends Controller_Base
{

    public function action_index()
    {
        session_unset();
        session_destroy();
        header('Location: /');
        
    }
}
