<?php

namespace backend\modules\repair_printer\models;

/**
 * This is the ActiveQuery class for [[Printer]].
 *
 * @see Printer
 */
class PrinterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Printer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Printer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
