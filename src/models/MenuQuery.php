<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[Menu]].
 *
 * @see Menu
 */
class MenuQuery extends \amd_php_dev\yii2_components\models\SmartQuery
{
    public function active()
    {
        $this->andWhere(['active' => Menu::ACTIVE_ACTIVE]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return Menu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Menu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}