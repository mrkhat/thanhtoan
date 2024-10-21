<?php

namespace backend\modules\worklist\models;

/**
 * This is the ActiveQuery class for [[WorklistInfomation]].
 *
 * @see WorklistInfomation
 */
class WorklistInfomationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WorklistInfomation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorklistInfomation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
