<?php


class Post extends BaseModel{


    public function printpost(){
       $price = 100;
       $resarr = DB::getInstance()->db()->createCommand()
                                ->select('name, description, price')
                                ->from('product')
                                ->where('price > :price', array('price'=>$price))
                                ->queryRow();
        return $resarr;

    }


}