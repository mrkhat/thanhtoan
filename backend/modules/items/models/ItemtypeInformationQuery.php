<?php

namespace backend\modules\items\models;

/**
 * This is the ActiveQuery class for [[ItemtypeInformation]].
 *
 * @see ItemtypeInformation
 */
class ItemtypeInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ItemtypeInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemtypeInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
