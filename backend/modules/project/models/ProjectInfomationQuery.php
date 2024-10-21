<?php

namespace backend\modules\project\models;

/**
 * This is the ActiveQuery class for [[ProjectInfomation]].
 *
 * @see ProjectInfomation
 */
class ProjectInfomationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProjectInfomation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectInfomation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
