<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[Redirect]].
 *
 * @see Redirect
 */
class RedirectQuery extends \app\components\models\SmartQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Redirect[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Redirect|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * Активные массив редиректы
     * @return Redirect[]|array
     */
    public function getRedirects() {
        $this->andWhere(['active' => Redirect::ACTIVE_ACTIVE]);
        return $this->asArray()->all();
    }
}