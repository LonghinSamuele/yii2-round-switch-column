<?php

/**
 * Round switch view.
 * @project yii2-round-switch-column
 * @author Samuele Longhin
 *
 * @var $name string
 * @var $checked boolean
 * @var $active boolean
 * @var $model IdModelInterface
 * @var $disabledSwitchText string
 */

use samuelelonghin\grid\toggle\helpers\IdModelInterface;
use yii\bootstrap4\Html;

?>
<label class="yii2-round-switch <?= ($active ? '' : 'disabled') ?> right">
    <?= Html::checkbox($this->attribute, $checked, [
        'data-id' => $model->getAttribute($this->data_id_attribute),
    ]) ?>
    <div class="slider round"></div>
</label>
<?= ($active ? '' : $disabledSwitchText) ?>
