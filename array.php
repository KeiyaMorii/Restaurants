<?php
for($i = 1; $i <= 30; $i++){
    if($i % 15 == 0){
        print("FizzBuzz"."<br />");
    } elseif($i % 3 == 0){
        print("Fizz"."<br />");
    } elseif($i % 5 == 0){
        print("Buzz"."<br />");
    } else {
        print($i."\n");
    }
}
?>