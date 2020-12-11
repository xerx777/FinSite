<?php
// необходимые HTTP-заголовки 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// подключение базы данных и файл, содержащий объекты
include_once 'config/database.php';
include_once 'objects/news.php';
// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();
// инициализируем объект
$product = new Article($db);
// запрашиваем товары
$nat = isset($_GET['id']) ? $_GET['id'] : die();
$stmt = $product->natPaging($nat);

// прочитаем детали товара для редактирования 
//$product->readOne();

if ($nat != null) {

    $products_arr=array();
    $products_arr["records"]=array();

    // получаем содержимое нашей таблицы 
    // fetch() быстрее, чем fetchAll() 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // извлекаем строку
        extract($row);

        $product_item=array(
            "id" => $id,
            "image" => $image,
            "caption" => $caption,
            "content" => $content,
            "created" => $created
        );

        array_push($products_arr["records"], $product_item);
    }

    // устанавливаем код ответа - 200 OK 
    http_response_code(200);

    // выводим данные о товаре в формате JSON 
    echo json_encode($products_arr);
}

else {

    // установим код ответа - 404 Не найдено 
    http_response_code(404);

    // сообщаем пользователю, что товары не найдены 
    echo json_encode(array("message" => "Товары не найдены."), JSON_UNESCAPED_UNICODE);
}