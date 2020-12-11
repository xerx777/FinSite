<?

/**
 * Контроллер шаблона
 */
class Controller_Template extends Controller {
  /**
   * Название шаблона вида
   * @var  string
   */
  public $template_name = 'layout';

  /**
   * Свойство для установки контента шаблона
   * @var  string
   */
  public $content;

  /**
   * Создает шаблон и устанавливает ему свойство content
   */
  public function after() {
    // Работает только если в свойство response ничего не записано
    /* $global_data['controller']='index'(например)*/
    if($this->response === null) {
      View::set_global('controller', $this->controller);
			View::set_global('action', $this->action);
      /* В $response создан объект класса View: $file_path=__DIR__ . '/../views/services.php', $data=[$file_path=__DIR__ . '/../views/content.php',  $data=['text1' => $main_config[0]['article']] ]   */
			$this->response = View::factory($this->template_name, [
        'content' => $this->content
      ]);
		}
  }
}
