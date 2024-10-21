<?php

namespace backend\modules\tscd\models;

/**
 * This is the ActiveQuery class for [[Tscd]].
 *
 * @see Tscd
 */
class TaisancodinhQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tscd[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tscd|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
