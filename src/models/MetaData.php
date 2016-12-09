<?php

namespace amd_php_dev\module_main\models;

use amd_php_dev\yii2_components\widgets\form\SmartInput;
use Yii;

/**
 * This is the model class for table "{{%main_meta_data}}".
 *
 * @property string $url
 * @property string $h1
 * @property string $metaDescription
 * @property string $text
 * @property string $metaTitle
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 */
class MetaData extends \amd_php_dev\yii2_components\models\SmartRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_meta_data}}';
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
            case 'text' :
                $result = SmartInput::TYPE_REDACTOR;
                break;
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
        return [
            [['active', 'priority'], 'integer'],
            ['active', 'default', 'value' => static::ACTIVE_WAIT],
            [['url', 'h1', 'metaDescription'], 'string', 'max' => 255],
            [['metaTitle'], 'string', 'max' => 80],
            ['text', 'string'],
            [['url'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
        //
        //]);
        return parent::attributeLabels();
    }

    /**
     * @inheritdoc
     * @return MetaDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MetaDataQuery(get_called_class());
    }
}
