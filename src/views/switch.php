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
 * @var $id string
 * @var $disabledSwitchText string
 */

use samuelelonghin\grid\toggle\helpers\IdModelInterface;
use yii\bootstrap4\Html;

?>
<label class="yii2-round-switch <?= ($active ? '' : 'disabled') ?> right">
    <?= Html::checkbox($name, $checked, [
        'data-id' => $id,
    ]) ?>
    <div class="slider round"></div>
</label>
<?= ($active ? '' : $disabledSwitchText) ?>
