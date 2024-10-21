<?php

namespace backend\modules\repair_printer\models;

/**
 * This is the ActiveQuery class for [[repair_printer]].
 *
 * @see repair_printer
 */
class RepairPrinterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return repair_printer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return repair_printer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
