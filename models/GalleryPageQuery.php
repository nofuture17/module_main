<?php

namespace app\modules\main\models;

/**
 * This is the ActiveQuery class for [[GalleryPage]].
 *
 * @see GalleryPage
 */
class GalleryPageQuery extends \amd_php_dev\yii2_components\models\PageQuery
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
     * @return GalleryPage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryPage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
