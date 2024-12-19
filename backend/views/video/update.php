<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Video $model */

$this->title = 'Update Video: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'Video_ID' => $model->Video_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
