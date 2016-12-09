<?php

namespace amd_php_dev\module_main\models;

/**
 * This is the ActiveQuery class for [[GalleryVideo]].
 *
 * @see GalleryVideo
 */
class GalleryVideoQuery extends \amd_php_dev\yii2_components\models\gallery\VideoGalleryItemQuery
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
     * @return GalleryVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
