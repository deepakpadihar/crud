<?php
use yii\helpers\Html;
?>
 
<style>
table th,td{
    padding: 10px;
}
</style>
 
<?= Html::a('Create', ['student/create'], ['class' => 'btn btn-success']); ?>
 
<table border="1">
    <tr>
        <th>Full_name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php foreach($model as $field){ ?>
    <tr>
        <td><?= $field->full_name; ?></td>
        <td><?= $field->address; ?></td>
        <td><?= $field->phone; ?></td>
        <td><?= Html::a("Edit", ['student/edit', 'id' => $field->id]); ?> | <?= Html::a("Delete", ['student/delete', 'id' => $field->id]); ?></td>
    </tr>
    <?php } ?>
</table>



