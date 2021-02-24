<?php

namespace App\Services;

class CheckConditionData {

    public static function checkToilet($data){
        if($data->toilet === 0){
            $toilet = 'トイレあり';
          }
          if($data->toilet === 1){
              $toilet = 'トイレなし';
          }
          return $toilet;
     }

    public static function checkMedicine($data) {
        if($data->medicine === 0){
            $medicine = '服用確認';
        }else{
            $medicine = '服用未確認';
        }
        return $medicine;
    }
          
}