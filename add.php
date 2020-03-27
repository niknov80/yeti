<?php
require_once('functions.php');
require_once('lotsdata.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $added_lot['name'] = $_POST['lot-name'];
    $added_lot['category'] = $_POST['category'];
    $added_lot['cost'] = $_POST['lot-rate'];
   
    
    $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $dict = [
        'lot-name' => 'Наименование', 
        'category' => 'Категория', 
        'message' => 'Описание', 
        'lot-rate' => 'Начальная цена', 
        'lot-step' => 'Шаг ставки', 
        'lot-date' => 'Дата окончания торгов'
    ];

    $errors = [];

    foreach ($required as $key){
        // if ($_POST[$key] == 'lot-rate' || 'lot-step'){
        //     if (!filter_var($key, FILTER_VALIDATE_INT)){
        //         $errors[$key] = 'Поле \'<b>' . $dict[$key] . '</b>\' должно содержать цифру';
        //     }
        // }
        
        if (empty($_POST[$key])) {
            $errors[$key] = 'Поле \'<b>' . $dict[$key] . '</b>\' надо заполнить';
        }
    }

    
    if(isset($_FILES['photo2'])){
        $file_name = $_FILES['photo2']['name'];
        $file_path = __DIR__ . '/img/';
        $file_url = 'img/' . $file_name;
        $added_lot['imageUrl'] = $file_url;
        move_uploaded_file($_FILES['photo2']['tmp_name'], $file_path . $file_name);
    }

   
    if(count($errors)){
        $page_content = include_template('templates/add.php', [
            'added_lot' => $added_lot, 
            'errors' => $errors,
            'categories' => $categories
            ]);
    } else {
        $page_content = include_template('templates/lot.php', [
            'lot' => $added_lot,
            'categories' => $categories
            ]);
    }

    

} else {
    $page_content = include_template('templates/add.php', [
        'categories' => $categories
        ]);

}




$page_layout = include_template('templates/layout.php', [
    'title' => 'Добавление лота',
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => $categories,
    'page_content' => $page_content]);
  
print ($page_layout);
