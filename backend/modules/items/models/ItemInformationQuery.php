<?php

namespace backend\modules\items\models;

/**
 * This is the ActiveQuery class for [[ItemInformation]].
 *
 * @see ItemInformation
 */
class ItemInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ItemInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
