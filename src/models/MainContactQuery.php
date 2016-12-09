<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[MainContact]].
 *
 * @see MainContact
 */
class MainContactQuery extends \amd_php_dev\yii2_components\models\SmartQuery
{
    /**
     * @inheritdoc
     * @return MainContact[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MainContact|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
