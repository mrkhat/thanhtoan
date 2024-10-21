<?php

namespace backend\modules\khth\controllers;
use yii\data\SqlDataProvider;
use yii\web\UploadedFile;
use backend\modules\khth\models\Fileupload;

 

class CheckbenhnhanController extends \yii\web\Controller
{
    public function actionIndex()
    {
 $tn=isset(\Yii::$app->request->queryParams['tn'])?\Yii::$app->request->queryParams['tn']:"";
$tnqr= $tn;
 
$tnqr = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9. ]/', ' ', urldecode(html_entity_decode(strip_tags($tnqr))))));

 $tnqr= "'".str_replace('TN',"','TN", $tnqr)."'";
 
$sql = "SELECT
tn.SoTiepNhan AS stn,
bn.MaYTe,
bn.TenBenhNhan,
PB1.TenPhongBan AS TN_TenPhongBan,
tn.ThoiGianTiepNhan,
PB2.TenPhongBan AS NoiChiDinh,
dbo.DM_DichVu.TenDichVu,
dbo.DM_DichVu.NhomDichVu_Id,
dv2.TenNhomDichVu,
dbo.CLSYeuCau.NgayTao,
dbo.KhamBenh.ThoiGianKham,
LIS.Dictionary_Name AS CachGiaiQuyet,
dbo.CLSYeuCau.TrangThai

FROM
dbo.CLSYeuCau
LEFT JOIN dbo.TiepNhan AS tn ON dbo.CLSYeuCau.TiepNhan_Id = tn.TiepNhan_Id
LEFT JOIN dbo.DM_BenhNhan AS bn  on dbo.CLSYeuCau.BenhNhan_Id = bn.BenhNhan_Id
LEFT JOIN dbo.CLSYeuCauChiTiet ON dbo.CLSYeuCauChiTiet.CLSYeuCau_Id = dbo.CLSYeuCau.CLSYeuCau_Id
LEFT JOIN dbo.DM_DichVu ON dbo.DM_DichVu.DichVu_Id = dbo.CLSYeuCauChiTiet.DichVu_Id
LEFT JOIN dbo.DM_PhongBan AS PB1 ON PB1.PhongBan_Id = tn.NoiTiepNhan_Id
LEFT JOIN dbo.DM_PhongBan AS PB2 ON PB2.PhongBan_Id = dbo.CLSYeuCau.NoiYeuCau_Id
LEFT JOIN dbo.DM_NhomDichVu AS dv2 ON dbo.CLSYeuCau.NhomDichVu_Id = dv2.NhomDichVu_Id
LEFT JOIN dbo.KhamBenh ON dbo.KhamBenh.YeuCauChiTiet_Id = dbo.CLSYeuCauChiTiet.YeuCauChiTiet_Id
LEFT JOIN dbo.Lst_Dictionary AS LIS ON dbo.KhamBenh.HuongGiaiQuyet_Id = LIS.Dictionary_Id
WHERE
tn.SoTiepNhan IN ($tnqr)
AND dv2.NhomDichVu_Id = 27";
$sql_count = "SELECT COUNT(*) FROM TiepNhan AS count ";
 
 
$totalCount = \Yii::$app->db2->createCommand($sql_count)->queryScalar();
$dataProvider = new SqlDataProvider([
'db'=>'db2',
'sql' => $sql,
// 'totalCount' => $totalCount,
//'totalCount' => $totalCount,
'sort' =>false, 
'pagination' => [
        'pageSize' => 50,
    ],
]);
//$tn=\Yii::$app->request->queryParams['tn'];
 
//$models = $dataProvider->getModels();
 
 return $this->render('index',['sql'=>$dataProvider,'tn'=>$tn]);
    }
 public function actionUpdate()
    {
  $tn=isset(\Yii::$app->request->queryParams['tn'])?\Yii::$app->request->queryParams['tn']:"";
 $tn = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9. ]/', ' ', urldecode(html_entity_decode(strip_tags($tn))))));

  $id=isset(\Yii::$app->request->queryParams['id'])?\Yii::$app->request->queryParams['id']:"";
   $tnqr= "'$id'";
 $sql="UPDATE tn
SET tn.XaPhuong_Id = bn.XaPhuong_Id,
 tn.QuanHuyen_Id = bn.QuanHuyen_Id,
 tn.TinhThanh_Id = bn.TinhThanh_Id
FROM dbo.TiepNhan AS tn
INNER JOIN dbo.DM_BenhNhan AS bn ON tn.BenhNhan_Id = bn.BenhNhan_Id
WHERE	tn.SoTiepNhan in($tnqr)";
 
  \Yii::$app->db2->createCommand($sql)->execute();

    $this->redirect(['index', 'tn' => $tn]);
    
    }
     public function actionUncodexml(){
         $model=new Fileupload();
         $data=null;
//         var_dump(\Yii::$app->request->post());exit;;
        if (\Yii::$app->request->isPost) {
            		
 
            $file = UploadedFile::getInstance($model, 'imageFile');
 
  $data=(simplexml_load_file($file->tempName));
 
}
 
//$models = $dataProvider->getModels();
 
 return $this->render('checkxml',['model'=>$model,'data'=>$data]);
    }
}
