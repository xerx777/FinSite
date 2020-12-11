<?php
class Article {

    // подключение к базе данных и таблице 'products' 
    private $conn;
    private $table_name = "news";

    // свойства объекта 
    public $id;
    public $image;
    public $caption;
    public $content;
    public $created;

    // конструктор для соединения с базой данных 
    public function __construct($db){
        $this->conn = $db;
    }

    //----------------------------------------------------------
    // метод read() - получение новостей
    // полная выборка из таблицы новостей 
    function read(){

        // выбираем все записи 
        // выбираем все записи
        $query = "SELECT id, image, caption, content, created FROM " . $this->table_name . " ORDER BY created DESC";

        // подготовка запроса 
        $stmt = $this->conn->prepare($query);

        // выполняем запрос 
        $stmt->execute();

    return $stmt;
    }

    //-----------------------------------------------------------
    // выборка только по одной новости из таблицы новостей 
    function readOne() {
    
        // запрос для чтения одной записи (новости) 
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
    
        // подготовка запроса 
        $stmt = $this->conn->prepare( $query );
    
        // привязываем id товара, который будет обновлен 
        $stmt->bindParam(1, $this->id);
    
        // выполняем запрос 
        $stmt->execute();
    
        // получаем извлеченную строку 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // установим значения свойств объекта 
        $this->id = $row['id'];
        $this->image = $row['image'];
        $this->caption = $row['caption'];
        $this->content = $row['content'];
        $this->created = $row['created'];
    }

    //--------------------------------------------------------
    // метод search - поиск новостей по ключевым словам 
    function search($keywords){
    
        // выборка по всем записям 
        $query = "SELECT c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created FROM " . $this->table_name . " p LEFT JOIN categories c ON p.category_id = c.id WHERE p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ? ORDER BY p.created DESC";

        // подготовка запроса 
        $stmt = $this->conn->prepare($query);

        // очистка
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // привязка
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // выполняем запрос
        $stmt->execute();

        return $stmt;
    }

    //-----------------------------------------------------------------
    // чтение товаров с пагинацией 
    public function readPaging($from_record_num, $records_per_page){
    
        // выборка 
        $query = "SELECT id, image, caption, content, created FROM " . $this->table_name . " ORDER BY created DESC LIMIT ?, ?";
    
        // подготовка запроса 
        $stmt = $this->conn->prepare( $query );
    
        // свяжем значения переменных 
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // выполняем запрос 
        $stmt->execute();
    
        // вернём значения из базы данных 
        return $stmt;
    }

    //----------------------------------------------------------------
    // используется для пагинации товаров
    // счетчик пагинации 
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }






    //-----------------------------------------------------------------
    // добавление статей на 1-ой стр. 
    public function natPaging($nat){
    
        // выборка 
        $query = "SELECT id, image, caption, content, created FROM " . $this->table_name . " ORDER BY created DESC LIMIT ?, 3";
    
        // подготовка запроса 
        $stmt = $this->conn->prepare( $query );
    
        // свяжем значения переменных 
        $stmt->bindParam(1, $nat, PDO::PARAM_INT);
    
        // выполняем запрос 
        $stmt->execute();
    
        // вернём значения из базы данных 
        return $stmt;
    }

}
?>