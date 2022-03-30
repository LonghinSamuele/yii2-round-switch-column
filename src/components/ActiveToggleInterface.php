<?php

namespace samuelelonghin\grid\toggle\components;

interface ActiveToggleInterface
{
    public function save($runValidation = true, $attributeNames = null);

    public function validate($attributeNames = null, $clearErrors = true);

    public function getValore();

    public function setValore($value);

    public function getAttivo(&$out = false);

    public function getModel();

    public static function getGridViewColumns();

    public function getPrimaryKey($asArray = false);

    public static function primaryKey();
}