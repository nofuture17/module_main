<?php

namespace app\modules\main\models;

use Yii;

/**
 * This is the model class for table "{{%main_gallery_video}}".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 * @property integer $id_item
 * @property string $name
 * @property string $alt
 * @property string $content
 * @property string $text
 */
class GalleryVideo extends \amd_php_dev\yii2_components\models\gallery\VideoGalleryItem
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_gallery_video}}';
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
        //return \yii\helpers\ArrayHelper::merge(parent::rules(), [
        //
        //]);
        return parent::rules();
        /*return [
            [['active', 'priority', 'id_item'], 'integer'],
            [['content', 'text'], 'string'],
            [['name', 'alt'], 'string', 'max' => 255],
        ];*/
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
     * @return GalleryVideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryVideoQuery(get_called_class());
    }
}
