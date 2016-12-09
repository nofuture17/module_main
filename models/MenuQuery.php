<?php

namespace app\modules\main\models;

/**
 * This is the ActiveQuery class for [[Menu]].
 *
 * @see Menu
 */
class MenuQuery extends \app\components\models\SmartQuery
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