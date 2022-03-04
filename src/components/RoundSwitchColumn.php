<?php

/**
 * @file Render a round switch toggleColumn in Yii2 GridView.
 * @author Nick Denry
 */

namespace samuelelonghin\grid\toggle\components;

use app\models\PermessoToggleInterface;
use Yii;
use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use samuelelonghin\grid\toggle\assets\RoundSwitchAsset;
use samuelelonghin\grid\toggle\assets\RoundSwitchThemeAsset;
use samuelelonghin\grid\toggle\helpers\ModelHelper;

/**
 * Render a round switch toggleColumn in Yii2 GridView.
 * @author Nick Denry
 */
class RoundSwitchColumn extends DataColumn
{
	/**
	 * @var string toggle action name
	 */
	public $action = 'toggle';
	public $action_params = false;
	public $data_id_attribute = 'id';
	public $active_param = null;
	public $disabledSwitchTextAttribute = 'nome';

	/**
	 * {@inheritdoc}
	 */
	public function init()
	{
		if (empty($this->filter)) {
			$this->filter = [
				'1' => Yii::t('yii', 'Yes'),
				'0' => Yii::t('yii', 'No'),
			];
		}
		$this->headerOptions = ArrayHelper::merge($this->headerOptions, [
			'data-toggle-action' => Url::toRoute([$this->action]),
			'data-toggle-attribute' => $this->attribute,
		]);
		RoundSwitchAsset::register(Yii::$app->view);
		RoundSwitchThemeAsset::register(Yii::$app->view);
		parent::init();
		$this->action_params[] = $this->action;
		$this->headerOptions = ArrayHelper::merge($this->headerOptions, [
			'data-toggle-action' => Url::toRoute($this->action_params),
			'data-toggle-attribute' => $this->attribute,
		]);
	}

	/**
	 * {@inheritdoc}
	 */


	protected function renderDataCellContent($model, $key, $index)
	{
		$checked = \nickdenry\grid\toggle\helpers\ModelHelper::isChecked($model, $this->attribute);
		$out = null;
		$active = true;
		if ($model instanceof PermessoToggleInterface && !$this->active_param) {
			$active = $model->getAttivo($out);
		} else if ($this->active_param) {
			$active = ModelHelper::isChecked($model, $this->active_param);
		}

		return Yii::$app->view->render('@samuelelonghin/grid/toggle/views/switch', [
			'model' => $model,
			'id' => $model->getAttribute($this->data_id_attribute),
			'checked' => $checked,
			'name' => $this->attribute,
			'active' => $active,
			'disabledSwitchText' => $out ? $out->{$this->disabledSwitchTextAttribute} : ''
		]);
	}
}
