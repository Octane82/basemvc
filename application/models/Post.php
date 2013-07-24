<?php


class Post extends BaseModel{


    public function __construct(){
        parent::__construct();
    }


    public function post(){

        $sql="SELECT * FROM product";

        $result=mysql_query($sql);
        $resarr=$this->db2array($result);        //Массив значений выбранный из БД

        mysql_close();

        return $resarr;

    }


    //Конвертируем данные в массив
    public function db2array($data)   //Входной параметр $data ресурс зпроса sql
    {
        $arr=array();
        while($row=mysql_fetch_assoc($data)){
            $arr[]=$row;
        }
        return $arr;
    }



}