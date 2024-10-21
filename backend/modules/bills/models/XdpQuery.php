<?php

namespace backend\modules\bills\models;

/**
 * This is the ActiveQuery class for [[Xdp]].
 *
 * @see Xdp
 */
class XdpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Xdp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Xdp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
