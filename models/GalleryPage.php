<?php

namespace app\modules\main\models;

use Yii;

/**
 * This is the model class for table "{{%main_gallery_page}}".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $author
 * @property string $name
 * @property string $name_small
 * @property string $url
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $text_small
 * @property string $text_full
 * @property string $links
 * @property string $snipets
 * @property string $image_small
 * @property string $image_full
 */
class GalleryPage extends \amd_php_dev\yii2_components\models\Page
{
    const IMAGES_URL_ALIAS = '@web/data/images/main/gallery/';
    
    const ATTR_TAGS     = 'tags';
    const ATTR_IMAGES   = 'images';
    const ATTR_VIDEO    = 'videos';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_gallery_page}}';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(
            parent::behaviors(),
            [
                'imageGallery' => [
                    'class' => \amd_php_dev\yii2_components\behaviors\GalleryManager2::className(),
                    'valueRelation' => 'imageGalleryRelation',
                    'setableAttribute' => static::ATTR_IMAGES,
                    'type' => \amd_php_dev\yii2_components\behaviors\GalleryManager2::TYPE_IMAGE,
                ],
                'videoGallery' => [
                    'class' => \amd_php_dev\yii2_components\behaviors\GalleryManager2::className(),
                    'valueRelation' => 'videoGalleryRelation',
                    'setableAttribute' => static::ATTR_VIDEO,
                    'type' => \amd_php_dev\yii2_components\behaviors\GalleryManager2::TYPE_VIDEO,
                ],
                'tagManager' => [
                    'class' => \amd_php_dev\yii2_components\behaviors\taggable\TaggableBehavior::className(),
                    'tagRelation' => 'tagRelation',
                    'tagValueAttribute' => 'url',
                    'tagValueType' => 'string',
                    'tagFrequencyAttribute' => true,
                    'tagValuesAttribute' => static::ATTR_TAGS,
                ],
            ]
        );
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
            case self::ATTR_TAGS:
                $result = \amd_php_dev\yii2_components\widgets\form\SmartInput::TYPE_TAGS;
                break;
            case static::ATTR_IMAGES :
                $result = \amd_php_dev\yii2_components\widgets\form\SmartInput::TYPE_GALLERY_IMAGE;
                break;
            case static::ATTR_VIDEO :
                $result = \amd_php_dev\yii2_components\widgets\form\SmartInput::TYPE_GALLERY_VIDEO;
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
            case static::ATTR_IMAGES :
                $result = $this->getBehavior('imageGallery');
                break;
            case static::ATTR_VIDEO :
                $result = $this->getBehavior('videoGallery');
                break;
            case self::ATTR_TAGS:
                $result = \yii\helpers\ArrayHelper::map(
                    \app\modules\main\models\Tag::find()->defaultScope()->all(),
                    'url',
                    'name'
                );
                break;
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
            [self::ATTR_VIDEO, 'safe'],
            [self::ATTR_IMAGES, 'safe'],
            [self::ATTR_TAGS, 'safe'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
            self::ATTR_IMAGES => 'Галерея картинок',
            self::ATTR_VIDEO => 'Галерея видео',
            self::ATTR_TAGS => 'Теги',
        ]);
    }

    /**
     * @inheritdoc
     * @return GalleryPageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryPageQuery(get_called_class());
    }

    public function getImageGalleryRelation()
    {
        return $this->hasMany(
            GalleryImage::className(),
            ['id_item' => 'id']
        );
    }

    public function getVideoGalleryRelation()
    {
        return $this->hasMany(
            GalleryVideo::className(),
            ['id_item' => 'id']
        );
    }

    public function getTagRelation()
    {
        return $this->hasMany(\app\modules\main\models\Tag::className(), ['id' => 'id_tag'])
            ->viaTable('{{%main_gallery_to_tag}}', ['id_item' => 'id']);
    }
}
