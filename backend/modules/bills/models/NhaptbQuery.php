<?php

namespace backend\modules\bills\models;

/**
 * This is the ActiveQuery class for [[Nhaptb]].
 *
 * @see Nhaptbdien
 */
class NhaptbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Nhaptb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Nhaptb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
