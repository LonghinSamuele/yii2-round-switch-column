<?php

/**
 * Round switch view.
 * @project yii2-round-switch-column
 * @author Samuele Longhin
 *
 * @var $name string
 * @var $checked boolean
 * @var $model IdModelInterface
 */

use samuelelonghin\grid\toggle\helpers\IdModelInterface;
use yii\bootstrap4\Html;

?>


<label class="yii2-round-switch right">
    <?= Html::checkbox($name, $checked, [
        'data-id' => $model->getId(),
    ]); ?>
    <div class="slider round"></div>
</label>