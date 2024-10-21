<?php

namespace backend\modules\recive\models;

/**
 * This is the ActiveQuery class for [[Recive]].
 *
 * @see Recive
 */
class ReciveQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Recive[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Recive|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
