<?php

namespace amd_php_dev\module_main\models;

use Yii;
use \amd_php_dev\yii2_components\widgets\form\SmartInput;
use \yii\helpers\FileHelper;

/**
 * This is the model class for table "param".
 *
 * @property integer $id
 * @property string $param
 * @property string $value
 * @property string $default
 * @property string $name
 * @property string $type
 */
class Param extends \amd_php_dev\yii2_components\models\SmartRecord
{

    /**
     * Возвращает список существующих тем
     * @return int|null
     */
    public static function getThemes() {
        $result = [];

        if ($handle = opendir(\Yii::getAlias('@app/themes'))) {
            /* Именно этот способ чтения элементов каталога является правильным. */
            while (false !== ($file = readdir($handle))) {
                if (!in_array($file, ['.', '..']) && !is_file($file))
                    $result[] = $file;
            }

            closedir($handle);
        }

        return $result;
    }

    // Методы SmartInputInterface
    public function getInputType($attribute)
    {
        $result = null;

        switch ($attribute) {
            case 'value' :
                if (in_array($this->type, ['theme', 'boolean'])) {
                    $result = SmartInput::TYPE_SELECT;
                } elseif (in_array($this->type, ['boolean'])) {
                    $result = SmartInput::TYPE_SELECT;
                } else {
                    $result = SmartInput::TYPE_TEXTAREA;
                }
                break;
            case 'default' :
                if (in_array($this->type, ['theme', 'boolean'])) {
                    $result = SmartInput::TYPE_SELECT;
                } elseif (in_array($this->type, ['boolean'])) {
                    $result = SmartInput::TYPE_SELECT;
                } else {
                    $result = SmartInput::TYPE_TEXTAREA;
                }
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
            case 'value' :
                if ($this->type == 'theme') {
                    $result = [];
                    $themes = self::getThemes();
                    foreach ($themes as $theme) {
                        $result[$theme] = $theme;
                    }
                } elseif ($this->type == 'boolean') {
                    $result = [0 => 'Нет', 1 => 'Да'];
                }
                break;
            case 'default' :
                if ($this->type == 'theme') {
                    $result = [];
                    $themes = self::getThemes();
                    foreach ($themes as $theme) {
                        $result[$theme] = $theme;
                    }
                } elseif ($this->type == 'boolean') {
                    $result = [0 => 'Нет', 1 => 'Да'];
                }
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['param', 'value', 'name', 'type'], 'required'],
                [['value', 'default'], 'string'],
                [['param', 'type'], 'string', 'max' => 128],
                [['name'], 'string', 'max' => 255],
                [['param'], 'unique']
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
                'param' => 'Машинное имя',
                'value' => 'Значение',
                'default' => 'По умолчанию',
                'name' => 'Имя',
                'type' => 'Тип',
            ]
        );
    }

    /**
     * @inheritdoc
     * @return ParamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParamQuery(get_called_class());
    }
}
