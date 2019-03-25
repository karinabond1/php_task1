<?php

function upload(){
    $upload_file = UPLOAD_DIR . basename($file_name);
    $file_path = UPLOAD_DIR;
    $file_name = $_FILES['file_name']['name'];
    
    if(move_uploaded_file($_FILES['file_name']['tmp_name'], "$file_path/$file_name")){
        echo "File is added!";
        return true;
    } else {
        echo "File is NOT added! Be sure that you added the file!";
        return false;
    }
    
}

function delete(){

}

function getFileSize(){
    $size = $_FILES['file_name']['size'];
    if($size<1024){
        return $size."B";
    }else if($size >= 1024){
	$kb_size = round($size/1024, 0);
        return $kb_size."KB";
    }
    else if($size >= 1024000){
	$mb_size = round($size/1024000, 0);
        return $mb_size."MB";
    }

}

function showTable(){

}


?>
