<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');


if( isset($_POST["array"]) ){
    $data = dateTag();
    echo json_encode($data);
}

else{
    header("HTTP/1.1 400 Bad Request");
    echo "Введеные данные не корректны";
}

?>
