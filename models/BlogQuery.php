<?php

namespace vova07\blogs\models;

use vova07\users\traits\ModuleTrait;
use yii\db\ActiveQuery;

/**
 * Class BlogQuery
 * @package vova07\blog\models
 */
class BlogQuery extends ActiveQuery
{
    use ModuleTrait;

    /**
     * Select published posts.
     *
     * @return $this
     */
    public function published()
    {
        $this->andWhere(['status_id' => Blog::STATUS_PUBLISHED]);

        return $this;
    }

    /**
     * Select unpublished posts.
     *
     * @return $this
     */
    public function unpublished()
    {
        $this->andWhere(['status_id' => Blog::STATUS_UNPUBLISHED]);

        return $this;
    }
}
