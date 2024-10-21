<?php

namespace backend\modules\bills\models;

/**
 * This is the ActiveQuery class for [[Tonkho]].
 *
 * @see Tonkho
 */
class TonkhoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tonkho[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tonkho|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
