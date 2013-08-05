<?php
//HTML helper class

class HTML{

    //mixed $action='', string $method='post', array $htmlOptions=array ( ))
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


    public static function endForm(){
        return "</form>";
    }

    //string $label='submit', array $htmlOptions=array ( )
    public static function submitButton($label = 'submit', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        return '<input type="submit" value="'.$label.'" '.$params.'>';
    }

    //link(string $text, mixed $url='#', array $htmlOptions=array ( ))
    public static function link($text, $url='', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        return '<a href="'.$url.'" '.$params.'>'.$text.'</a>';
    }

    //textField(string $name, string $value='', array $htmlOptions=array ( ))
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

    //rows="10" cols="45"
    //textArea(string $name, string $value='', array $htmlOptions=array ( 'rows'=>10, 'cols'=>45))
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

    // <input type="radio" name="browser" value="ie"> Internet Explorer<Br>
    //checkBox(string $name, boolean $checked=false, array $htmlOptions=array ( )
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

    //CHtml::checkBoxList('Author[books][]', $selected_keys=array(), $books);
    //checkBoxList(string $name, mixed $select, array $data, array $htmlOptions=array ( ))
    //name -- checkbox list  $select = id выбранных полей с 0 (если false или пустой массив то нет выбранных полей)	$data -(массив лейблов checkbox)
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



    //radioButton(string $name, boolean $checked=false, array $htmlOptions=array ( )
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



    //radioButtonList(string $name, mixed $select, array $data, array $htmlOptions=array ( ))
    //name -- radio list  $select = id выбранных полей с 0 (если false или пустой массив то нет выбранных полей)	$data -(массив лейблов checkbox)
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




    //dropDownList(string $name, string $select, array $data, array $htmlOptions=array ( ))
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

    //string fileField(string $name, string $value='', array $htmlOptions=array ( ))
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


    //hiddenField(string $name, string $value='', array $htmlOptions=array ( ))
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


    //image(string $src, string $alt='', array $htmlOptions=array ( ))
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


    //passwordField(string $name, string $value='', array $htmlOptions=array ( ))
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


    //button(string $label='button', array $htmlOptions=array ( ))
    public static function button($label = 'button', $htmlOptions = array()){
        $params = '';
        foreach($htmlOptions as $key=>$val){
            $params .= $key.'="'.$val.'" ';
        }
        return '<button '.$params.'>'.$label.'</button>';
    }

    //Encodes special characters into HTML entities.
    public static function encode($text){
        return htmlspecialchars($text, ENT_QUOTES);
    }

    //Decodes special HTML entities back to the corresponding characters
    public static function decode($text){
        return htmlspecialchars_decode($text, ENT_QUOTES);
    }



}

