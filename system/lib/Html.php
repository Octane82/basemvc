<?php
//HTML helper class

class HTML{

    /**
     * Метод генерирует тег <form> с параметрами
     * @param string $action
     * @param string $method
     * @param array $htmlOptions
     * @return string
     */
    public static function beginForm($action = '', $method = 'post', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($action != ''){
            return '<form action="' .$action. '"method = "'.$method.'" '.$params.'>';
        }else
            return '<form method = "'.$method.'" '.$params.'>';
    }

    /**
     * Метод генерирует закрывающий тег </form>
     * @return string
     */
    public static function endForm(){
        return "</form>";
    }

    /**
     * Метод генерирует кнопку отправки submit button
     * @param string $label
     * @param array $htmlOptions
     * @return string
     */
    public static function submitButton($label = 'submit', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        return '<input type="submit" value="'.$label.'" '.$params.'>';
    }

    /**
     * Метод генерирует ссылку
     * @param $text
     * @param string $url
     * @param array $htmlOptions
     * @return string
     */
    public static function link($text, $url='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        return '<a href="'.$url.'" '.$params.'>'.$text.'</a>';
    }

    /**
     * Метод генерирует текстовое поле
     * @param $name
     * @param string $value
     * @param array $htmlOptions
     * @return string
     */
    public static function textField($name, $value='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($value != ''){
            return '<input type="text" name="'.$name.'" value="'.$value.'" '.$params.'>';
        }else
            return '<input type="text" name="'.$name.'" '.$params.'>';
    }

    /**
     * Метод генерирует текстовую область
     * @param $name
     * @param string $value
     * @param array $htmlOptions
     * @return string
     */
    public static function textArea($name, $value='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($value != ''){
            return '<textarea '.$params.' type="text" name="'.$name.'">'.$value.'</textarea>';
        }else
            return '<textarea '.$params.' type="text" name="'.$name.'"></textarea>';
    }


    /**
     * Метод генерирует чекбокс
     * @param $name
     * @param bool $checked
     * @param array $htmlOptions
     * @return string
     */
    public static function checkBox($name, $checked = false, $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($checked){
            return ' <input type="checkbox" name="'.$name.'" checked="checked" '.$params.'>';
        }else
            return ' <input type="checkbox" name="'.$name.'" '.$params.'>';
    }

    /**
     * Метод генерирует список чекбоксов
     * @param $name
     * @param array $select     id выбранных полей с 0 (если false или пустой массив то нет выбранных полей)
     * @param array $data       (массив лейблов checkbox)
     * @param array $htmlOptions
     * @return string
     */
    public static function checkBoxList($name, $select=array(), $data = array(), $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        $i = 0;
        $htmldata = '';
        foreach($data as $val){
            if($select == false){
                $htmldata .= ' <input value="'.$i.'" id="'.$name.'_'.$i.'" type="checkbox" name="'.$name.'[]" '.$params.'><label for="'.$name.'_'.$i.'">'.$val.'</label><br/>';
            } else
            {
                if(in_array($i, $select)){
                    $htmldata .= ' <input value="'.$i.'" id="'.$name.'_'.$i.'" type="checkbox" name="'.$name.'[]" checked="checked" '.$params.'><label for="'.$name.'_'.$i.'">'.$val.'</label><br/>';
                }else
                    $htmldata .= ' <input value="'.$i.'" id="'.$name.'_'.$i.'" type="checkbox" name="'.$name.'[]" '.$params.'><label for="'.$name.'_'.$i.'">'.$val.'</label><br/>';
            }
            $i++;
        }
        return $htmldata;
    }


    /**
     * Метод генерирует радио кнопку
     * @param $name
     * @param bool $checked
     * @param array $htmlOptions
     * @return string
     */
    public static function radioButton($name, $checked = false, $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($checked){
            return ' <input type="radio" name="'.$name.'" checked="checked" '.$params.'>';
        }else
            return ' <input type="radio" name="'.$name.'" '.$params.'>';
    }


    /**
     * Метод генерирует список радио кнопок
     * @param $name
     * @param array $select     id выбранных полей с 0 (если false или пустой массив то нет выбранных полей)
     * @param array $data       (массив лейблов checkbox)
     * @param array $htmlOptions
     * @return string
     */
    public static function radioButtonList($name, $select=array(), $data = array(), $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        $i = 0;
        $htmldata = '';
        foreach($data as $val){
            if($select == false){
                $htmldata .= ' <input value="'.$i.'" id="'.$name.'_'.$i.'" type="radio" name="'.$name.'[]" '.$params.'><label for="'.$name.'_'.$i.'">'.$val.'</label><br/>';
            } else
            {
                if(in_array($i, $select)){
                    $htmldata .= ' <input value="'.$i.'" id="'.$name.'_'.$i.'" type="radio" name="'.$name.'[]" checked="checked" '.$params.'><label for="'.$name.'_'.$i.'">'.$val.'</label><br/>';
                }else
                    $htmldata .= ' <input value="'.$i.'" id="'.$name.'_'.$i.'" type="radio" name="'.$name.'[]" '.$params.'><label for="'.$name.'_'.$i.'">'.$val.'</label><br/>';
            }
            $i++;
        }
        return $htmldata;
    }

    /**
     * Метод генерирует выпадающее меню
     * @param $name
     * @param $select
     * @param array $data
     * @param array $htmlOptions
     * @return string
     */
    public static function dropDownList($name, $select, $data = array(), $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        $htmldata .= '<select name="'.$name.'" '.$params.'>';
        foreach($data as $val=>$item){
            if(array_key_exists($select, $data) && $val == $select){
                $htmldata .= '<option value="'.$val.'" selected="selected">'.$item.'</option>';
            }else
                $htmldata .= '<option value="'.$val.'">'.$item.'</option>';
        }
        $htmldata .= '</select>';
        return $htmldata;
    }

    /**
     * Метод генерирует поле, для загрузки файлов
     * @param $name
     * @param string $value
     * @param array $htmlOptions
     * @return string
     */
    public static function fileField($name, $value='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($value != ''){
            return '<input type="file" name="'.$name.'" value="'.$value.'" '.$params.'>';
        }else
            return '<input type="file" name="'.$name.'" '.$params.'>';
    }


    /**
     * Метод генерирует скрытое поле
     * @param $name
     * @param string $value
     * @param array $htmlOptions
     * @return string
     */
    public static function hiddenField($name, $value='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($value != ''){
            return '<input type="hidden" name="'.$name.'" value="'.$value.'" '.$params.'>';
        }else
            return '<input type="hidden" name="'.$name.'" '.$params.'>';
    }

    /**
     * Метод генерирует ссылку на изображение
     * @param $src
     * @param string $alt
     * @param array $htmlOptions
     * @return string
     */
    public static function image($src, $alt='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($alt != ''){
            return '<img src="'.$src.'" alt="'.$alt.'" '.$params.'>';
        }else
            return '<img src="'.$src.'" '.$params.'>';
    }

    /**
     * Метод генерирует поле для ввода пароля
     * @param $name
     * @param string $value
     * @param array $htmlOptions
     * @return string
     */
    public static function passwordField($name, $value='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        if($value != ''){
            return '<input type="password" name="'.$name.'" value="'.$value.'" '.$params.'>';
        }else
            return '<input type="password" name="'.$name.'" '.$params.'>';
    }

    /**
     * Метод генерирует кнопку
     * @param string $label
     * @param array $htmlOptions
     * @return string
     */
    public static function button($label = 'button', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        return '<button '.$params.'>'.$label.'</button>';
    }

    /**
     * Метод преобразует специальные символы в html сущности
     * @param $text
     * @return string
     */
    public static function encode($text){
        return htmlspecialchars($text, ENT_QUOTES);
    }

    /**
     * Метод преобразет текст с html сущностями в текст (обратно encode)
     * @param $text
     * @return string
     */
    public static function decode($text){
        return htmlspecialchars_decode($text, ENT_QUOTES);
    }

}

