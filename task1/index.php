<?php
include_once 'config.php';
include_once 'function.php';

//print_r($_FILES);

if (isset($_POST['btn_send'])) {

    $perm_file = permision(FILE_DATA);
    $perm_dir = permision(UPLOAD_DIR);

    $file_name = $_FILES['file_name']['name'];
    $upload = upload();
    $file_size = get_file_size();
    if ($upload && $perm_file && $perm_dir) {
        $str = $file_name . "-" . $file_size;
        add_to_file($str);
    } else {
        show();
    }
}
$arr = make_arr();
$show = "";
if (isset($_POST["btn_del"])) {
    foreach ($arr as $key => $value) {
        $id = $_REQUEST['id'];
        if ($key == $id) {
            $delete_file = delete_file($value[0]);
            $str = $value[0] . "-" . $value[1] . ';';
            $delete_from_file = delete_from_file($str);
            if (!$delete_file && !$delete_from_file) {
                $show=show();
            }
        }
    }
}
$arr = make_arr();

include 'templates/index.php';

?>