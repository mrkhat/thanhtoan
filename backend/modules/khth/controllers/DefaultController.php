<?php

namespace backend\modules\khth\controllers;

use yii\web\Controller;

/**
 * Default controller for the `dntt` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query1 = "SELECT
dbo.DM_PhongBan.PhongBan_Id,
dbo.DM_PhongBan.MaPhongBan,
dbo.DM_PhongBan.TenPhongBan,
dbo.DM_PhongBan.CapTren_Id,
dbo.DM_PhongBan.Cap
FROM dbo.DM_PhongBan
WHERE TamNgung =0 and
TenPhongBan LIKE '%187%'";
        $query2="SELECT
dbo.Sys_Users.User_Name,
dbo.Sys_Users.User_Code,
dbo.Sys_AppPrivateSettings.Setting_Id,
dbo.Sys_AppPrivateSettings.Group_Code,
dbo.Sys_AppPrivateSettings.Code,
dbo.Sys_AppPrivateSettings.User_Id,
dbo.Sys_AppPrivateSettings.[Value],
dbo.Sys_AppPrivateSettings.Description
FROM
dbo.Sys_AppPrivateSettings
INNER JOIN dbo.Sys_Users ON dbo.Sys_Users.User_Id = dbo.Sys_AppPrivateSettings.User_Id
where	 User_Code like 'thoaink'";
        $query3="SELECT
dbo.Sys_Users.User_Name,
dbo.Sys_Users.User_Code,
dbo.Sys_AppPrivateSettings.Setting_Id,
dbo.Sys_AppPrivateSettings.Group_Code,
dbo.Sys_AppPrivateSettings.Code,
dbo.Sys_AppPrivateSettings.User_Id,
dbo.Sys_AppPrivateSettings.[Value],
dbo.Sys_AppPrivateSettings.Description
FROM
dbo.Sys_AppPrivateSettings
INNER JOIN dbo.Sys_Users ON dbo.Sys_Users.User_Id = dbo.Sys_AppPrivateSettings.User_Id
where	 User_Code like 'thoaink'";
        return $this->render('index');
    }
      public function actionList() {

        $dataProvider = UserInformation::find()->limit(100)->all();
        $data = (ArrayHelper::toArray($dataProvider));
//    var_dump($dataProvider);
//        return $this->renderAjax('list', ['model' => $data]);

//    return $out;
    }
}
