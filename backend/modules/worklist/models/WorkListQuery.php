<?php

namespace backend\modules\worklist\models;

/**
 * This is the ActiveQuery class for [[WorkList]].
 *
 * @see WorkList
 */
class WorkListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WorkList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
