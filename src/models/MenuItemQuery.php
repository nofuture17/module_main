<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[MenuItem]].
 *
 * @see MenuItem
 */
class MenuItemQuery extends \amd_php_dev\yii2_components\models\SmartQuery
{
    public function behaviors()
    {
        return [
            'nestedCategoryQuery' => [
                'class' => '\amd_php_dev\yii2_components\behaviors\nestedsets\NestedSetsQueryBehavior',
            ]
        ];
    }
    /**
     * Только активные
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['active' => MenuItem::ACTIVE_ACTIVE]);
        return $this;
    }

    /**
     * Настраивает запрос для поля ввода
     * @return $this
     */
    public function toInput()
    {
        return $this->active();
    }

    /**
     * Исключить элемент с $id
     * @param $id
     * @return $this
     */
    public function except($id)
    {
        $this->andWhere('[[id]] != ' . (int) $id);
        return $this;
    }

    /**
     * Только родители
     * @return $this
     */
    public function parent()
    {
        $this->andWhere('[[id_parent]] = 0');
        return $this;
    }

    /**
     * Сортировка по умолчанию
     * @return $this
     */
    public function sort($active = true)
    {
        if ($active) {
            $this->active();
        }

        $this->orderBy('id DESC, priority ASC');
        return $this;
    }

    /**
     * @inheritdoc
     * @return MenuItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}