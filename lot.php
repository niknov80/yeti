<?
require_once('functions.php');
require_once('lotsdata.php');

$lot = null;

if (isset($_GET['lot_id'])){
    $lot_id = $_GET['lot_id'];

    foreach ($lots as $key => $item){
        if ($key == $lot_id){
            $lot = $item;
            break;
        }
    }
} 

if (!$lot){
    http_response_code(404);
}


$page_content = include_template('templates/lot.php', [
    'categories' => $categories,
    'lot' => $lot,
    'end_date' => $end_date
    ]);

$page_layout = include_template('templates/layout.php', [
    'title' => 'Детальная информация о лоте',
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => $categories,
    'page_content' => $page_content]);
  
print ($page_layout);