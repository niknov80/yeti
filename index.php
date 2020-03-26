<?php
require_once('functions.php');
require_once('lotsdata.php');

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$categories = [
    'Доски и лыжи',
    'Крепления',
    'Ботинки',
    'Одежда',
    'Инструменты',
    'Разное'    
];



$end_date = 'tomorrow';

$page_content = include_template('templates/index.php', [
    'lots' => $lots,
    'end_date' => $end_date]);

$page_layout = include_template('templates/layout.php', [
    'title' => 'Главная страница',
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => $categories,
    'page_content' => $page_content]);
  
print ($page_layout);