<?php
include 'config.php';
include 'function.php';
include 'templates/index.php';
print_r($_FILES);
$file_name = $_REQUEST['file_name'];
$arr = array();
$temp = "0";
if(isset($_REQUEST['btn_send']) ){
    $file_name = $_FILES['file_name']['name'];

    $upload = upload();
    $file_size = getFileSize();
    $arr_small = array(1 => $file_name,
		 2 => $file_size);
    array_push($arr[$temp], $arr_small);
    print_r($arr);
    $temp = $temp + 1;

}else {
	echo "File is not uloaded";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="file_name" >
        <input type="submit" name="btn_send">
    </form>
    
</body>
</html>
