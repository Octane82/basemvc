<?php


class Post extends BaseModel{


    public function printpost($price){
        $sql = "SELECT * FROM product WHERE price > $price";
        $resarr = Application::getInstance()->db()->createCommand($sql)->query();
        return $resarr;
    }


}