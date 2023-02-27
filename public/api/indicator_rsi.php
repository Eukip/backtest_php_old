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


//    $log = date('Y-m-d H:i:s') . ' indicator_rsi.php $_POST: '.print_r($_POST, true);
//    $log2 = date('Y-m-d H:i:s') . ' indicator_rsi.php $ohlcv (раскодированый): '.print_r($ohlcv, true);
//    $log3 = date('Y-m-d H:i:s') . ' Вызываем indicator_rsi из filtersIndicatorsParameters.php';
//    file_put_contents(__DIR__.'/logs/api_log.log', $log . PHP_EOL, FILE_APPEND);
//    file_put_contents(__DIR__.'/logs/api_log.log', $log2 . PHP_EOL, FILE_APPEND);
//    file_put_contents(__DIR__.'/logs/api_log.log', $log3 . PHP_EOL, FILE_APPEND);


    $data = indicator_rsi(
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
