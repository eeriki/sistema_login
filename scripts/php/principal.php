<?php

$conexao = new mysqli('localhost', 'erkg5', '1113836246', 'cadastro', 3306);

function searchNicks($array, $target){    
    foreach($array as $nickname){
        if($nickname['nickname'] === $target){
            return false;
        }
    }
    return true;
}

function comparePass($datapass, $target_pass){
    if ($datapass === $target_pass){
        return true;
    }
    return false;
}

function request($array_nick, $target_nick, $datapass, $target_pass){
    if (searchNicks($array_nick, $target_nick)){
        return false;
    }
    if(!comparePass($datapass, $target_pass)){
        return false;
    }

    if(!searchNicks($array_nick, $target_nick) && comparePass($datapass, $target_pass)){
        return true;
    }
}