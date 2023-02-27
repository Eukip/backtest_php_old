<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');
header('Access-Control-Allow-Origin: *');


if(isset($_POST["ohlcv"]) && isset($_POST["priceMinusPerc"])){

    if(isset($_POST["levelCandle"])) {
      $levelCandle = $_POST["levelCandle"];
    }

    else {
      $levelCandle = null;
    }

    $ohlcv = json_decode($_POST["ohlcv"]);


    //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/api.log', 'print_r($ohlcv, true)' . PHP_EOL, FILE_APPEND);
    //error_log("getOrderPriceByOHLCV. ohlcv раскодированный в php: ".var_dump($ohlcv), 0);
    //print_f("test");
    //print_r($ohlcv, true);


    $log = date('Y-m-d H:i:s') . ' getOrderPriceByOHLCV $_POST: '.print_r($_POST, true);
    $log2 = date('Y-m-d H:i:s') . ' getOrderPriceByOHLCV $ohlcv: '.print_r($ohlcv, true);
    $log3 = date('Y-m-d H:i:s') . ' Вызываем getOrderPriceByOHLCV из filtersIndicatorsParameters.php';
    file_put_contents(__DIR__.'/logs/api_log.log', $log . PHP_EOL, FILE_APPEND);
    file_put_contents(__DIR__.'/logs/api_log.log', $log2 . PHP_EOL, FILE_APPEND);
    file_put_contents(__DIR__.'/logs/api_log.log', $log3 . PHP_EOL, FILE_APPEND);

    $data = getOrderPriceByOHLCV(
                                  $ohlcv,
                                  $_POST["priceMinusPerc"],
                                  $levelCandle
                                );
    echo json_encode($data);
}

else{
    header("HTTP/1.1 400 Bad Request");
    echo "Введеные данные не корректны";
}

?>
