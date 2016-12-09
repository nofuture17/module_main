<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[Param]].
 *
 * @see Param
 */
class ParamQuery extends \app\components\models\SmartQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Param[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Param|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}