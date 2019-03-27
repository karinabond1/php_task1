<?php

function upload()
{
    $file_path = UPLOAD_DIR;
    $file_name = $_FILES['file_name']['name'];

    if (move_uploaded_file($_FILES['file_name']['tmp_name'], "$file_path/$file_name")) {
        return true;
    } else {
        return false;
    }

}

function delete_file($file_name)
{
    $file_path = UPLOAD_DIR;

    if (unlink("$file_path/$file_name")) {
        return true;
    } else {
        return false;
    }

}

function delete_from_file($str)
{
    $file = fopen(FILE_DATA, 'r');
    $text = fread($file, filesize(FILE_DATA));
    fclose($file);
    $file = fopen(FILE_DATA, 'w');
    if (fwrite($file, str_replace($str, '', $text))) {
        fclose($file);
        return true;
    } else {
        return false;
    }


}

function get_file_size()
{
    $size = $_FILES['file_name']['size'];
    if ($size < 1024) {
        return $size . "B";
    } else if ($size >= 1024 && $size < 1024000) {
        $kb_size = round($size / 1024, 0);
        return $kb_size . "KB";
    } else if ($size >= 1024000) {
        $mb_size = round($size / 1024000, 0);
        return $mb_size . "MB";
    }

}

function add_to_file($str)
{
    $exists = false;
    $current = file_get_contents(FILE_DATA);
    $arr = explode(";", $current);

    foreach ($arr as $line) {
        $exists = $exists || trim($line) === $str;
    }

    if (!$exists) {
        file_put_contents(FILE_DATA, $str . ";", FILE_APPEND | LOCK_EX);
    }
}


function make_arr()
{
    $current = file_get_contents(FILE_DATA);
    $arr = array();
    $temp_arr = array();
    $arr_all = array();
    $arr = explode(";", $current);
    $temp = 1;
    foreach ($arr as $element) {
        if (!empty($element)) {
            $temp_arr[] = $element;
        }
    }
    foreach ($temp_arr as $value) {
        $arr_all[$temp] = explode("-", $value);
        $temp++;
    }
    return $arr_all;
}

function permision($file)
{
    $perm = substr(sprintf('%o', fileperms(UPLOAD_DIR)), -3);
    if ($perm == 777) {
        return true;
    } else {
        if (chmod($file, 0777)) {
            return true;
        } else {
            return false;
        }
    }

}

function show()
{
    echo "Something went wrong!";
}

?>
