<?php

namespace backend\modules\device\models;

/**
 * This is the ActiveQuery class for [[DeviceHistory]].
 *
 * @see DeviceHistory
 */
class DeviceHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DeviceHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DeviceHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
