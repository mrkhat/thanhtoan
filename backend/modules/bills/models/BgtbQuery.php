<?php

namespace backend\modules\bills\models;

/**
 * This is the ActiveQuery class for [[Bgtbnuoc]].
 *
 * @see Bgtbnuoc
 */
class BgtbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Bgtbnuoc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Bgtbnuoc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
