<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
    
    ]); ?>


<h1>Fruit Consumption</h1>

<table class="table table-striped table-hover">
    r
    <tr>
        <th></th>
        <th>Jane</th>
        <th>John</th>
    </tr>
    
    <?php
        foreach ($list as $fruit){
        $id = $book['id'];
    ?>
    <!--these set the values in the table within the loop -->
    <tr>
        <td><?= $book['book_title'] ?></td>
        <td><?= $book['author'] ?></td>
        <td><a href="?r=book-master/view&id=<?= $id ?>">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true">    
                View
            </a>
        </td>
    </tr>
    
    <?php
        }
    ?>
</table>