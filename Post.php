<?php


class Post {
    private $id = array();
    private $nome = array();
    private $avatar = array();
    private $text = array();
    private $data = array();
    function setId($id) {
        $this->id[] = $id;
    }

    function setNome($nome) {
        $this->nome[] = $nome;
    }

    function setAvatar($avatar) {
        $this->avatar[] = $avatar;
    }

    function setText($text) {
        $this->text[] = $text;
    }

    function setData($data) {
        $this->data[] = $data;
    }

    function getId() {
        return $this->id;
    }
    function getNome() {
        return $this->nome;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getText() {
        return $this->text;
    }
    function getData() {
        return $this->data;
    }

                
    
    function pegarInfo(String $url){
       $delimitador = Array ("}","{","\"",",{");
       $pronto = str_replace($delimitador, $delimitador[0], $url);
       $res = explode($delimitador[0], $pronto);   
       return $res;
    }

    function setInfo(Array $inf){
        $max = sizeof($inf);
        for($i = 0; $i < $max;$i++){
            if(strcmp($inf[$i], "id")== 0){
             $this->setId($inf[$i+2]);
            }
            if(strcmp($inf[$i], "name")== 0){
                $this->setNome($inf[$i+2]);
            }
            if(strcmp($inf[$i], "avatar")== 0){
                $this->setAvatar($inf[$i+2]);
            }
            if(strcmp($inf[$i], "text")== 0){
                $this->setText($inf[$i+2]);
            }
            if(strcmp($inf[$i], "createdAt")== 0){
                
                $d= str_replace("T"," ", $inf[$i+2]);
                $d= explode(".", $d);
                $this->setData($d[0]);
            }
        }

    }
    function calcTemp(){
        date_default_timezone_set('America/Sao_Paulo');
        $d=$this->getData();
        $max = sizeof($d);
        $atual=new DateTime(date('y-m-d H:i:s')); 
        $diff = Array();
        $calcT = Array();
        for($i = 0; $i < $max;$i++){
            $diff[]=$atual->diff(new DateTime($d[$i]));
        }     
          
        for($i = 0; $i < $max;$i++){
          
            
            if($diff[$i]->format('%Y')!=0) {
                if($diff[$i]->format('%Y')>1){
                    $calcT[]= "ha ".$diff[$i]->format('%Y')." anos";
                }else{
                    $calcT[]= "ha ".$diff[$i]->format('%Y')." ano";
                }
            }else if($diff[$i]->format('%M')!=0) {
                if($diff[$i]->format('%M')>1){
                    $calcT[]= "ha ".$diff[$i]->format('%M')." meses";
                }else{
                    $calcT[]= "ha ".$diff[$i]->format('%M')." mes";
                }
            } else if($diff[$i]->format('%D')!=0) {
                if($diff[$i]->format('%D')>1){
                    $calcT[]= "ha ".$diff[$i]->format('%D')." dias";
                }else{
                    $calcT[]= "ha ".$diff[$i]->format('%D')." dia";
                }
            }else if($diff[$i]->format('%H')!=0) {
                if($diff[$i]->format('%H')>1){
                    $calcT[]= "ha ".$diff[$i]->format('%H')." horas";
                }else{
                    $calcT[]= "ha ".$diff[$i]->format('%H')." hora";
                }
            }
            else if($diff[$i]->format('%I')!=0) {
                if($diff[$i]->format('%I')>1){
                    $calcT[]= "ha ".$diff[$i]->format('%I')." minutos";
                }else{
                    $calcT[]= "ha ".$diff[$i]->format('%I')." minuto";
                }
            }  
        }
        return $calcT;
    }
    
    
    function insertionSort()
    {
        $array=Array();
        $array=$this->getData();
        $max = sizeof($array);
        $ordem= Array();
        for($i = 0; $i < $max;$i++){
            $ordem[$i]=$i;
        }
        for ($i = 0; $i < count($array); $i++) {
               $val = $array[$i];
               $ord = $ordem[$i];
		       $j = $i-1;
		while($j>=0 && $array[$j] < $val){
			$array[$j+1] = $array[$j];
                        $ordem[$j+1]=$ordem[$j];
			$j--;
		}
		$array[$j+1] = $val;
                $ordem[$j+1] = $ord;
        }
 
        return $ordem;
    }

}
