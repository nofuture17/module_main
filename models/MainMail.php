<?php

namespace app\modules\main\models;

use Yii;

/**
 * This is the model class for table "{{%main_mail}}".
 *
 * @property string $name
 * @property string $address
 * @property string $page
 * @property string $data
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 */
class MainMail extends \amd_php_dev\yii2_components\models\SmartRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_mail}}';
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
        return [
            static::ACTIVE_ACTIVE     => 'Отправлено',
            static::ACTIVE_WAIT       => 'Ожидает',
            static::ACTIVE_BLOCKED    => 'Ошибка',
        ];
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
            case 'address' :
                if (method_exists($this, 'search')) {
                    \amd_php_dev\yii2_components\widgets\form\SmartInput::TYPE_SELECT;
                } else {
                    \amd_php_dev\yii2_components\widgets\form\SmartInput::TYPE_READONLY;
                }
                break;
            default:
                $result = \amd_php_dev\yii2_components\widgets\form\SmartInput::TYPE_READONLY;
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
            case 'address' :
                $data = $this->find()->distinct()->asArray()->all();
                $result = [];
                foreach ($data as $item) {
                    $result['address'] = $item['address'];
                }
                break;
            case 'name' :
                $data = $this->find()->distinct()->asArray()->all();
                $result = [];
                foreach ($data as $item) {
                    $result['address'] = $item['address'];
                }
                break;
            case 'page' :
                $data = $this->find()->distinct()->asArray()->all();
                $result = [];
                foreach ($data as $item) {
                    $result['address'] = $item['address'];
                }
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
            [['data'], 'string'],
            [['active', 'priority'], 'integer'],
            [['name', 'address', 'page'], 'string', 'max' => 255],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
            'data' => 'Отправленные данные',
            'name' => 'Название',
            'address' => 'Адрес',
            'page' => 'Страница',
            'active' => 'Статус',
        ]);
    }

    /**
     * @inheritdoc
     * @return MainMailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MainMailQuery(get_called_class());
    }
}
