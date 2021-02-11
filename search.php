<?php
function write_data_to_csv(){

    $restaurants = [];
    $response = "hogehoge";

    if(isset($response["error"])){
        return print("エラーが発生しました！");
    }

    if(isset($response["rest"])){
        foreach($response["rest"] as &$i){
            $restaurant_name = $i["name"];
            $restaurants[] = $restaurant_name;
        }
    }

    return print_r($restaurants);
}


write_data_to_csv();

?>