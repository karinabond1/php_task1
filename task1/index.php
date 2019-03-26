<?php
include 'config.php';
include 'function.php';

//print_r($_FILES);

if (isset($_POST['btn_send'])) {
    $file_name = $_FILES['file_name']['name'];
    $upload = upload();
    if (!$upload) {
        echo "File is not added!";
    } else {
        $file_size = get_file_size();

        $str = $file_name . "-" . $file_size;
        add_to_file($str);
    }
}
$arr = make_arr();

if (isset($_POST["btn_del"])) {
    foreach ($arr as $key => $value) {
        $id = $_REQUEST['id'];
        if ($key == $id) {
            $delete_file = delete_file($value[0]);
            $str = $value[0] . "-" . $value[1] . ';';
            $delete_from_file = delete_from_file($str);
            if (!$delete_file && !$delete_from_file) {
                echo "File is not deleted!";
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <title>Task 1</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file_name">
    <input type="submit" name="btn_send">
</form>


<?php include 'templates/index.php'; ?>


</body>
</html>