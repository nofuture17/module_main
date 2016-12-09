<?php

namespace amd_php_dev\module_main\models;

use Yii;
use \amd_php_dev\yii2_components\widgets\form\SmartInput;
use \yii\helpers\ArrayHelper;
/**
 * This is the model class for table "menu_item".
 *
 * @property integer $id
 * @property integer $active
 * @property string $name
 * @property string $url
 * @property string $image
 * @property string $linkOptions
 * @property string $options
 * @property string $dropDownOptions
 * @property integer $id_menu
 * @property integer $id_parent
 * @property integer $author
 * @property integer $priority
 */
class MenuItem extends \amd_php_dev\yii2_components\models\SmartRecord
{
    const IMAGES_URL_ALIAS = '@web/data/images/main/menu-item/';
    
    public function behaviors()
    {
        return [
            '\amd_php_dev\yii2_components\behaviors\AuthorBehavior',
            'nestedCategory' => [
                'class' => '\amd_php_dev\yii2_components\behaviors\NestedCategoryBehavior',
                'treeAttribute' => 'tree',
            ],
            'image' => [
                'class' => \amd_php_dev\yii2_components\behaviors\ImageUploadBehavior::className(),
                'attribute' => 'image',
                'createThumbsOnSave' => false,
                'maxWidth' => \Yii::$app->params['IMAGE_THUMB.MAX_WIDTH'],
                'maxHeight' => \Yii::$app->params['IMAGE_THUMB.MAX_HEIGHT'],
                'fileUrl' => Yii::getAlias(static::IMAGES_URL_ALIAS),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['id_menu', 'id_parent', 'author', 'priority'], 'integer'],
                ['image', 'safe'],
                ['image', 'file', 'extensions' => 'jpeg, jpg, gif, png'],
                [['name', 'id_menu'], 'required'],
                ['priority', 'default', 'value' => 100],
                [['name', 'url'], 'string', 'max' => 255]
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
                'name' => 'Название',
                'image' => 'Изображение',
                'url' => 'Url',
                'id_menu' => 'Секция',
                'id_parent' => 'Родитель',
                'author' => 'Автор',
                'priority' => 'Приоритет',
                'linkOptions' => 'HTML-атрибуты ссылки',
                'options' => 'HTML-атрибуты контейнера(li)',
                'dropDownOptions' => 'Для \yii\bootstrap\Dropdown'
            ]
        );
    }

    /**
     * @inheritdoc
     * @return MenuItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuItemQuery(get_called_class());
    }

    // Методы SmartInputInterface
    public function getInputType($attribute)
    {
        $result = null;

        switch ($attribute) {
            case 'id_menu':
            case 'id_parent':
                $result = SmartInput::TYPE_SELECT;
                break;
            case 'image':
                $result = SmartInput::TYPE_IMAGE_SINGLE;
                break;
            case 'priority':
                $result = SmartInput::TYPE_NUMBER;
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
            case 'id_menu':
                $result = Menu::getDb()->cache(function ($db) {
                    return ArrayHelper::map(Menu::find()->active()->all(), 'id', 'name');
                });
                break;
            case 'id_parent':
                $result = $this->getBehavior('nestedCategory')->getParentInputData();
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

    public function getChildren()
    {
        return $this->hasMany($this->className(), ['id_parent' => 'id'])->sort();
    }

    public function isParent()
    {
        return !(bool) $this->id_parent;
    }
}
