<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');
header('Access-Control-Allow-Origin: *');


if( isset($_POST["ohlcv"]) &&
    isset($_POST["periodFast"]) &&
    isset($_POST["periodLong"]) &&
    isset($_POST["periodSignal"])
   ){

    if(isset($_POST["type"])) {
      $type=$_POST["type"];
    }

    else {
      $type = "percent";
    }

    if(isset($_POST["offset"])) {
      $offset = $_POST["offset"];
    }

    else {
      $offset = null;
    }

    $ohlcv = json_decode($_POST["ohlcv"]);
    $data = indicator_macd(
                          $ohlcv,
                          $_POST["periodFast"],
                          $_POST["periodLong"],
                          $_POST["periodSignal"],
                          $type,
                          $offset
                          );

    echo json_encode($data);
}

else{
    header("HTTP/1.1 400 Bad Request");
    echo "Введеные данные не корректны";
}

?>
