<?php

namespace backend\modules\khth\controllers;

use yii\web\Controller;
use yii\helpers\ArrayHelper;
/**
 * Default controller for the `dntt` module
 */
class UsersController extends Controller
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
    
      public function actionListpb($q=null) {
            if (\Yii::$app->request->isAjax) {
            if ($this->request->isPost) {
//         
                $q = $this->request->post('q');
            }
        }
  $query="SELECT
dbo.DM_PhongBan.PhongBan_Id,
dbo.DM_PhongBan.MaPhongBan,
dbo.DM_PhongBan.TenPhongBan,
dbo.DM_PhongBan.CapTren_Id,
dbo.DM_PhongBan.Cap
FROM dbo.DM_PhongBan
WHERE TamNgung =0 and
TenPhongBan LIKE '%187%'";
             if (is_null($q) || (int) ($q) == 0) {
 
             $dataProvider = (new \yii\db\Query())
                    ->select(["PhongBan_Id", "TenPhongBan", "iif(dbo.DM_PhongBan.CapTren_Id=0,dbo.DM_PhongBan.PhongBan_Id,dbo.DM_PhongBan.CapTren_Id) as CapTren_Id", "Cap"])
                    ->from('DM_PhongBan')
                    ->andFilterWhere(['=', 'TamNgung', 0])
                    ->andFilterWhere(['like', 'TenPhongBan', ''])
                    ->orderBy('CapTren_Id asc,Cap asc')
                    ->all(\Yii::$app->db2);
        } else {
          
                     $dataProvider = (new \yii\db\Query())
                    ->select(["PhongBan_Id", "TenPhongBan", "iif(dbo.DM_PhongBan.CapTren_Id=0,dbo.DM_PhongBan.PhongBan_Id,dbo.DM_PhongBan.CapTren_Id) as CapTren_Id", "Cap"])
                     ->from('Sys_AppPrivateSettings')
                
                    ->leftJoin('DM_PhongBan','DM_PhongBan.MaPhongBan = Sys_AppPrivateSettings.Code')
                     ->leftJoin('Sys_Users', "Sys_Users.User_Id = Sys_AppPrivateSettings.User_Id")
                    ->andFilterWhere(['=', 'TamNgung', 0])
                       ->andFilterWhere(['=', 'Group_Code', 'PhongBan'])
                    ->andFilterWhere(['=', 'Sys_AppPrivateSettings.User_Id', $q])
               
                    ->orderBy('CapTren_Id asc,Cap asc')
                    ->all(\Yii::$app->db2);
//                     exit;
//                    var_dump($dataProvider->createCommand()->getRawSql());
//          exit;
    }
        $data = (ArrayHelper::toArray($dataProvider));
//    var_dump($data);
        return $this->renderAjax('listpb', ['model' => $data]);

//    return $out;
    }
    
 
    public function actionRoom()
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
        return $this->render('room');
    }
    
    
    public function actionListsysg($q = null) {
        // Lấy danh sách group trong table Sys_Groups
        if (\Yii::$app->request->isAjax) {
            if ($this->request->isPost) {
//         
                $q = $this->request->post('q');
            }
        }
//        $query = "SELECT Group_id,Group_Code, Group_Name FROM Sys_Groups";


        if (is_null($q) || (int) ($q) == 0) {
            $dataProvider = (new \yii\db\Query())->select(["Group_id", "Group_Code", "Group_Name",])->from('Sys_Groups')->andFilterWhere(['like', 'Group_Name', ''])->orderBy('Group_Code asc,')->all(\Yii::$app->db2);
        } else {


            $dataProvider = (new \yii\db\Query())->select(["Sys_Groups.Group_id as Group_id", "Group_Code", "Group_Name",])->from('Sys_UserGroups')
                    ->leftJoin('Sys_Groups', "Sys_Groups.Group_Id = Sys_UserGroups.Group_Id")
                    ->andFilterWhere(['=', 'User_Id', $q])
                    ->orderBy('Group_Code asc,')
                    ->all(\Yii::$app->db2);
//            var_dump($dataProvider->createCommand()->getRawSql());
//          exit;
        }
        $data = (ArrayHelper::toArray($dataProvider));
//    var_dump($data);
        return $this->renderAjax('listgroub', ['model' => $data]);

//    return $out;
    }

    public function actionListusers($q = null, $id = null,$g){
 // Lấy danh sách user theo điều kiện 
        
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'name' => '']];
    if (!is_null($q)) {
 
        $data = (new \yii\db\Query())->select(['User_Id as id','User_Code as code','User_Name as name','Suspend as status'])->from('Sys_Users')->orFilterWhere(['like', 'User_Code',$q])->orFilterWhere(['like', 'User_Name',$q])->limit(20)->all(\Yii::$app->db2);
//      echo $data->createCommand()->getRawSql()."<br>";
//        var_dump($data);
        $out['results'] =array_values(ArrayHelper::toArray($data));
    }
    elseif ($id > 0) {
 
    
        $out['results'] = (['id' => $id, 'name' => Items::find($id)->one()->name]);
    }
    return $out;
    }
    
        public function actionSysgroup()
    {  
            // Hệ Thống - Quản Trị Người Dùng - Quản Trị group người dùng của user
        return $this->render('sysgroup');
    }
    
     public function actionUpdatesysusergroup(){
          // Hệ Thống - Quản Trị Người Dùng - add thêm group quản trị cho user
           if (\Yii::$app->request->isAjax&&$this->request->isPost) {
           
         $q = $this->request->post('q');
         $data="";
         $userid= (int)$this->request->post('uid');
//         
           
         if($userid>0&& !is_null($q)){
         
         foreach ($q as $value) {
            $data.= "(".implode(",",$value)."),";
         }
          
        $sql= "INSERT INTO [eHospital_DongNai_A].[dbo].[Sys_UserGroups] ([User_Id], [Group_Id]) VALUES ". rtrim($data,',');
        $sql2="DELETE  FROM [eHospital_DongNai_A].[dbo].[Sys_UserGroups] WHERE ([User_Id]='$userid')" ;
        
            \Yii::$app->db2->createCommand($sql2)->execute();
            \Yii::$app->db2->createCommand($sql)->execute();
            return true;
//          var_dump($sql);
//         var_dump($sql2);
       
     } return false;
     
     }return false;
     
         }
}
