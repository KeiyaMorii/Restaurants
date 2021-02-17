<?php
// 外部ファイルを読み込み、実行する
require 'vendor/autoload.php';
use GuzzleHttp\Client;

# 初期設定
$KEYID = ""; // アクセスキーをいれている
$HIT_PER_PAGE = 100; // 取得する件数をいれている
$PREF = "PREF13"; // 都道府県をいれている
$FREEWORD_CONDITION = 1; // AND検索を設定
$FREEWORD = "渋谷駅 " . $_POST['search']; // フリーワード検索の中身を設定、$_POSTは

$PARAMS = array("keyid"=> $KEYID, "hit_per_page"=>$HIT_PER_PAGE, "pref"=>$PREF, "freeword_condition"=>$FREEWORD_CONDITION, "freeword"=>$FREEWORD);

function write_data_to_csv($params){

    $restaurants = [["名称","住所","営業日","電話番号"]];
    $client = new Client();
    try{
        $json_res = $client->request('GET', "https://api.gnavi.co.jp/RestSearchAPI/v3/", ['query' => $params])->getBody();
    }catch(Exception $e){
        return print("エラーが発生しました。");
    }
    $response = json_decode($json_res,true);

    if(isset($response["error"])){
        return(print("エラーが発生しました！"));
    }

    
    foreach($response["rest"] as &$restaurant){
        $rest_info = [$restaurant["name"],$restaurant["address"],$restaurant["opentime"],$restaurant["tel"],$restaurant["image_url"]["shop_image1"]];
        $restaurants[] = $rest_info;
    }
    $handle = fopen("restaurants_list.csv", "wb");

    foreach ($restaurants as $values){
        fputcsv($handle, $values);
    }

    fclose($handle);
    return print_r($restaurants);
}
print($KEYID);
write_data_to_csv($PARAMS);

?>