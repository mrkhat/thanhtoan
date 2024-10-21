<?php

namespace backend\modules\khth\models;

/**
 * This is the ActiveQuery class for [[Luotkhamtrongngay]].
 *
 * @see Luotkhamtrongngay
 */
class LuotkhamtrongngayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Luotkhamtrongngay[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Luotkhamtrongngay|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
