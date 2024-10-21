<?php

namespace backend\modules\recive\models;

/**
 * This is the ActiveQuery class for [[ReciveInformation]].
 *
 * @see ReciveInformation
 */
class ReciveInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ReciveInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ReciveInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
