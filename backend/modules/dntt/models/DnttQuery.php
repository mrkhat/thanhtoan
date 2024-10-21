<?php

namespace backend\modules\dntt\models;

/**
 * This is the ActiveQuery class for [[dntt]].
 *
 * @see dntt
 */
class DnttQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return dntt[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return dntt|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
