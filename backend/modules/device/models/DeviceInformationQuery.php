<?php

namespace backend\modules\device\models;

/**
 * This is the ActiveQuery class for [[DeviceInformation]].
 *
 * @see DeviceInformation
 */
class DeviceInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DeviceInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DeviceInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
