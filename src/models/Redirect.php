<?php

namespace amd_php_dev\module_main\models;

use Yii;
use \amd_php_dev\yii2_components\widgets\form\SmartInput;

/**
 * This is the model class for table "{{%redirect}}".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $code
 * @property string $from
 * @property string $to
 * @property integer $author
 */
class Redirect extends \amd_php_dev\yii2_components\models\SmartRecord
{
    // Статусы редиректов
    const CODE_301 = 301;
    const CODE_302 = 302;

    public function behaviors()
    {
        return [
            '\amd_php_dev\yii2_components\behaviors\AuthorBehavior',
        ];
    }

    // Методы SmartInputInterface
    public function getInputType($attribute)
    {
        $result = null;

        switch ($attribute) {
            case 'code' :
                $result = SmartInput::TYPE_SELECT;
                break;
            default:
                $result = parent::getInputType($attribute);
        }

        return $result;
    }

    public function getInputData($attribute)
    {
        $result = null;

        switch ($attribute) {
            case 'code' :
                $result = self::getCodeArray();
                break;
            default:
                $result = parent::getInputData($attribute);
        }

        return $result;
    }

    public function getInputOptions($attribute)
    {
        return parent::getInputOptions($attribute);
    }

    /**
     * Возвращает массив код статуса => описание
     * @return array
     */
    public static function getCodeArray()
    {
        return [
            self::CODE_301 => 'Постоянный (301)',
            self::CODE_302 => 'Временный (302)'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%redirect}}';
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

                [['from', 'to', 'active', 'code'], 'required'],

                ['code', 'integer'],
                ['code', 'default', 'value' => self::CODE_301],
                ['code', 'in', 'range' => array_keys(self::getCodeArray())],

                [['from', 'to'], 'string', 'max' => 255]
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
                'code' => 'Код',
                'from' => 'Откуда',
                'to' => 'Куда',
                'author' => 'Author',
            ]
        );
    }

    /**
     * @inheritdoc
     * @return RedirectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RedirectQuery(get_called_class());
    }
}
