<?php

namespace backend\modules\bills\models;

/**
 * This is the ActiveQuery class for [[Bills]].
 *
 * @see Bills
 */
class BillsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Bills[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Bills|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
