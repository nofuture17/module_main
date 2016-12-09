<?php

namespace app\modules\main\models;

/**
 * This is the ActiveQuery class for [[GalleryImage]].
 *
 * @see GalleryImage
 */
class GalleryImageQuery extends \amd_php_dev\yii2_components\models\gallery\ImageGalleryItemQuery
{

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        //return ArrayHelper::merge(parent::behaviors(), [
        //
        //]);
        return parent::behaviors();
    }

    /**
     * @inheritdoc
     * @return GalleryImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
