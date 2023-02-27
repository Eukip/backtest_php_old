<?php
include $_SERVER['DOCUMENT_ROOT']."/filtersIndicatorsParameters.php";
header('Content-Type: application/json');
header('Allow-methods: POST');
header('Access-Control-Allow-Origin: *');


if( isset($_POST["numArray"]) && isset($_POST["period"]) ){

    if(isset($_POST["offset"])) {
      $offset=$_POST["offset"];
    }

    else {
      $offset = null;
    }
    $numArray = json_decode($_POST["numArray"]);
    $data = smoothedParam(
                          $numArray,
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
