<?php

namespace app\modules\main\models;

use Yii;

/**
 * This is the model class for table "{{%main_contact}}".
 *
 * @property string $code
 * @property string $name
 * @property string $value
 * @property string $description
 * @property integer $active
 * @property integer $priority
 */
class MainContact extends \amd_php_dev\yii2_components\models\SmartRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_contact}}';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
        //
        //]);
        return parent::behaviors();
    }

    /**
    * @inheritdoc
    */
    public static function getActiveArray()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::getActiveArray(), [
        //
        //]);
        return parent::getActiveArray();
    }

    /**
    * @inheritdoc
    */
    public function getItemUrl() {
        if ($this->isNewRecord)
            return false;

        //return Url::to(['', 'url' => $this->url]);
        return '';
    }

    /**
    * @inheritdoc
    */
    public function getInputType($attribute)
    {
        $result = null;

        switch ($attribute) {
            default:
                $result = parent::getInputType($attribute);
        }

        return $result;
    }

    /**
    * @inheritdoc
    */
    public function getInputData($attribute)
    {
        $result = null;

        switch ($attribute) {
            default:
                $result = parent::getInputData($attribute);
        }

        return $result;
    }

    /**
    * @inheritdoc
    */
    public function getInputOptions($attribute)
    {
        $result = null;

        switch ($attribute) {
            default:
                $result = parent::getInputOptions($attribute);
        }

        return $result;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return \yii\helpers\ArrayHelper::merge(parent::rules(), [
            [['code', 'name', 'value', 'description'], 'string', 'max' => 255],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
            'name' => 'Название',
            'value' => 'Значение',
            'description' => 'Описание',
        ]);
    }

    /**
     * @inheritdoc
     * @return MainContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MainContactQuery(get_called_class());
    }
}
