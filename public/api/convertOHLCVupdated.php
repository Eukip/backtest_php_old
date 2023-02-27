<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');

if( isset($_POST["ohlcv"]) && isset($_POST["newScale"]) ){

    if(isset($_POST["fromScale"])) {
      $fromScale=$_POST["fromScale"];
    }

    else {
      $fromScale = null;
    }
    $ohlcv = json_decode($_POST["ohlcv"]);
    $data = convertOHLCVupdated($ohlcv, $_POST["newScale"], $fromScale);
    echo json_encode($data);
}

else{
    header("HTTP/1.1 400 Bad Request");
    echo "Введеные данные не корректны";
}

?>
