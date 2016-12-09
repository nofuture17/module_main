<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[MainMail]].
 *
 * @see MainMail
 */
class MainMailQuery extends \amd_php_dev\yii2_components\models\SmartQuery
{

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        //return ArrayHelper::merge(parent::behaviors(), [
        //
        //]);
        return parent::behaviors();
    }

    /**
     * @inheritdoc
     * @return MainMail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MainMail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
