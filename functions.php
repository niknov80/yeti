<?
function include_template($template_path, $template_data){
    if (file_exists($template_path)){
        ob_start();
        require($template_path);
        $content = ob_get_clean();
    } else {
        $content = "xer";
    }

    return $content;
}

function cost_formating ($cost) {
    $cost = number_format(ceil ($cost), 0, '.', ' ') . "<b class='rub'>р</b>";
    return $cost;
}



function timer($end_time){
    // date_default_timezone_set("Europe/Moscow");

    $curend_time = strtotime('now');
    $end_time = strtotime($end_time);

    $time_remaind = $end_time - $curend_time;

    $hours = floor($time_remaind / 3600);
    $minutes = floor($time_remaind % 3600 / 60);

    $result = $hours . " : " . $minutes;

    return $result;     
}

function vd ($val){
    print_r ('<pre>');
    var_dump($val);
    print_r ('</pre>');
}