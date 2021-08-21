<?php

/**
 * Round switch view.
 * @project yii2-round-switch-column
 * @author Nick Denry
 */

use yii\bootstrap4\Html;

?>


<label class="yii2-round-switch right">
    <?= Html::checkbox($name, $checked, [
        'data-id' => $model->id,
    ]); ?>
    <div class="slider round"></div>
</label>