<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');
header('Access-Control-Allow-Origin: *');


if( isset($_POST["ohlcv"]) && isset($_POST["period"]) ){

    if(isset($_POST["offset"])) {
      $offset==$_POST["offset"];
    }

    else {
      $offset = null;
    }

    $ohlcv = json_decode($_POST["ohlcv"]);

    $data = indicator_rsi_tv(
                          $ohlcv,
                          $_POST["period"],
                          $offset
                          );

    echo json_encode($data);
}

else{
    header("HTTP/1.1 400 Bad Request");
    echo "Введеные данные не корректны";
}

?>