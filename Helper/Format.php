<?php 


class Format{


    public function textShorten($text,$limit=400){
                $text .= " ";
                $text = substr($text,0,$limit);
                $text.="...";
                return $text;
    }
}

?>