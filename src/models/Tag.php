<?php

namespace amd_php_dev\module_main\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $priority
 * @property integer $active
 * @property integer $author
 * @property integer $frequency
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
class Tag extends \app\components\models\Page
{
    const IMAGES_PATH_ALIAS = '@webroot/data/images/tag/';
    const IMAGES_URL_ALIAS = '@web/data/images/tag/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), []);
    }

    public function getItemUrl() {
        if ($this->isNewRecord)
            return false;

        return Url::to(['/tag/default/index', 'url' => $this->url]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return \yii\helpers\ArrayHelper::merge(parent::rules(), []);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), []);
    }

    /**
     * @inheritdoc
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }
}
