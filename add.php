<?php
require_once('functions.php');
require_once('lotsdata.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $added_lot = $_POST;
    
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
        if (empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
        }
    }
    

    if(count($errors)){
        $page_content = include_template('templates/add.php', [
            'added_lot' => $added_lot, 
            'errors' => $errors, 
            'dict' => $dict]);
    } else {
        $page_content = include_template('templates/lot.php', ['addaed_lot' => $added_lot]);
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
