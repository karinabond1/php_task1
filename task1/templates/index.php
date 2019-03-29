<?php
include_once '/home/user14/public_html/PHP/php_task1/php_task1/php_task1/task1/index.php';

//print_r($arr);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/global.css" rel="stylesheet" type="text/css">
    <title>Task 1</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file_name">
    <input type="submit" name="btn_send">
</form>
<?php
if (!empty($arr)) {
?>


<table class="table-class">
    <tr>
        <td>№</td>
        <td>Name</td>
        <td>Size</td>
        <td>Delete</td>
    </tr>

    <?php
    foreach ($arr as $key => $value) { ?>
        <tr>
            <td><? echo $key; ?></td>
            <? foreach ($value as $elem) { ?>
                <td><?= $elem ?></td>
            <? } ?>
            <td>
                <form method="post" action="?id=<?= $key ?>" enctype="multipart/form-data">
                    <button name="btn_del" formmethod="post">Delete</button>
                </form>
            </td>
        </tr>
    <? }
    echo $show;
    } ?>
</table>

</body>
</html>