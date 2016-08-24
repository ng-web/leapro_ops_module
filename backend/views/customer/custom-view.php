<?php
$this->params['breadcrumbs'][] = ['label' => 'Book Master', 'url' => '?r=book-master'];
$this->params['breadcrumbs'][] = $company;
?>
<h1> Customer ID:  <?= $id ?></h1>

<table class="table table-striped table-bordered table-hover">
    <tr>
        <td>Customer</td>
        <td><?= $name ?></td>
        <td></td>
    </tr>
    <tr>
        <td>Company</td>
        <td><?= $company ?></td>
        <td></td>
    </tr>
</table>

<?php
$data['yourName'] = "Doron";
echo $this->context->renderPartial('_partial', $data);
// or <?=$this->render('filename');
