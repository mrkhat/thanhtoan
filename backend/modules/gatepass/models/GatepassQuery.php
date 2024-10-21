<?php

namespace backend\modules\gatepass\models;

/**
 * This is the ActiveQuery class for [[Gatepass]].
 *
 * @see Gatepass
 */
class GatepassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Gatepass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Gatepass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
