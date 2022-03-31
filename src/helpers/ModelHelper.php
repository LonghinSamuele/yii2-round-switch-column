<?php

namespace samuelelonghin\grid\toggle\helpers;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use samuelelonghin\grid\toggle\Module as RoundSwitchModule;

/**
 * Description of modelHelper
 *
 * @author Nick Denry
 * @author Samuele Longhin
 */
class ModelHelper
{
	/**
	 * @param Model $model Yii model
	 * @param string $type RoundSwitchModule::SWITCH_KEY_ON or RoundSwitchModule::SWITCH_KEY_OFF
	 * @return mixed
	 * @throws InvalidConfigException
	 */
	public static function getToggleValue($model, $attribute, $type = RoundSwitchModule::SWITCH_KEY_ON)
	{
		$module = Yii::$app->getModule('roundSwitch');
		$switchValuesProperty = $module->switchValues;
		if ($model->hasProperty($switchValuesProperty)) {
			if (ArrayHelper::keyExists($attribute, $model->{$switchValuesProperty})) {
				return $model->{$module->switchValues}[$attribute][$type];
			} else {
				throw new InvalidConfigException('Attribute ' . $attribute . ' doesn\'t exist at ' . $switchValuesProperty . ' property array of ' . get_class($model) . ' model');
			}
		}
		return $type == RoundSwitchModule::SWITCH_KEY_ON ? true : false;
	}

	/**
	 * Check if model toggle attribute is equal to onValue or true (active)
	 * @param Model $model
	 * @param string $attribute model attribute name
	 * @return boolean
	 * @throws InvalidConfigException
	 */
	public static function isChecked($model, $attribute)
	{
		if (is_array($model)) {
			return array_key_exists($attribute, $model) && $model[$attribute];
		}
		$onValue = self::getToggleValue($model, $attribute);
		return $model->{$attribute} == $onValue;
	}

	/**
	 * @param array|Model $model
	 * @param $attribute
	 * @return mixed
	 */
	public static function getValue($model, $attribute): mixed
	{
		if (is_array($model)) {
			return array_key_exists($attribute, $model) ? $model[$attribute] : null;
		}
		return $model->getAttribute($attribute);
	}
}
