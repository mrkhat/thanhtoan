<?php

namespace backend\modules\payment\models;

/**
 * This is the ActiveQuery class for [[PaymentInformation]].
 *
 * @see PaymentInformation
 */
class ReciveInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PaymentInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PaymentInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
