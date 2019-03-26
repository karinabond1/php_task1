<?php
$arr = make_arr();
//print_r($arr);
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

    } ?>
</table>
