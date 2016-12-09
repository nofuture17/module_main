<?php

namespace amd_php_dev\module_main\models;

use Yii;
use \amd_php_dev\yii2_components\widgets\form\SmartInput;
/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $active
 * @property string $section
 * @property string $name
 * @property integer $author
 */
class Menu extends \amd_php_dev\yii2_components\models\SmartRecord
{
    public function behaviors()
    {
        return [
            '\amd_php_dev\yii2_components\behaviors\AuthorBehavior',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['author'], 'integer'],
                [['section', 'name'], 'required'],
                [['section', 'name'], 'string', 'max' => 255]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(),
            [
                'section' => 'Секция',
                'name' => 'Название',
                'author' => 'Автор',
            ]
        );
    }

    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }

    // Методы SmartInputInterface
    public function getInputType($attribute)
    {
        return parent::getInputType($attribute);
    }

    public function getInputData($attribute)
    {
        return parent::getInputData($attribute);
    }

    public function getInputOptions($attribute)
    {
        return parent::getInputOptions($attribute);
    }

    /**
     * Получить элементы меню для данной секции
     * @param $parent Только родительские
     * @return \amd_php_dev\module_main\models\MenuItem[]
     */
    public function getMenuItems($parent = true)
    {
        $query = $this->hasMany('\amd_php_dev\module_main\models\MenuItem', ['id_menu' => 'id'])->sort();

        if ($parent) {
            $query->parent();
        }

        return $query;
    }
}
