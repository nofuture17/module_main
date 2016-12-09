<?php

namespace app\modules\main\models;

use Yii;

/**
 * This is the model class for table "{{%main_gallery_image}}".
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
class GalleryImage extends \amd_php_dev\yii2_components\models\gallery\ImageGalleryItem
{
    const IMAGES_URL_ALIAS = '@web/data/images/main/gallery/image-gallery/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_gallery_image}}';
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
     * @return GalleryImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryImageQuery(get_called_class());
    }
}
