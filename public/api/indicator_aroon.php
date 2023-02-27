<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');
header('Access-Control-Allow-Origin: *');


if( isset($_POST["ohlcv"]) && isset($_POST["period"]) ){

    $ohlcv = json_decode($_POST["ohlcv"]);

    $data = indicator_aroon(
                          $ohlcv,
                          $_POST["period"]
                          );

    echo json_encode($data);
}

else{
    header("HTTP/1.1 400 Bad Request");
    echo "Введеные данные не корректны";
}

?>
