<?php

namespace backend\modules\khth\controllers;
use yii\data\SqlDataProvider;
use yii\web\UploadedFile;
use backend\modules\khth\models\Fileupload;

 

class CheckxmlController extends \yii\web\Controller
{
    public function actionIndex()
    {
 $tn=isset(\Yii::$app->request->queryParams['tn'])?\Yii::$app->request->queryParams['tn']:"";
$tnqr= $tn;
 
$tnqr = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9. ]/', ' ', urldecode(html_entity_decode(strip_tags($tnqr))))));

 $tnqr= "'".str_replace('TN',"','TN", $tnqr)."'";
 
$sql = "SELECT
	tn.SoTiepNhan as stn,
	'ngoai tru',
	tn.NoiTiepNhan_Id,
	dbo.DM_PhongBan.TenPhongBan,
	dbo.DM_PhongBan.MaPhongBan,
	dbo.DM_PhongBan.PhongBan_Id,
	dbo.me_User.User_Name,
	tn.NguoiTao_Id,
	tn.NguoiCapNhat_Id,
	tn.NgayTao,
	tn.BenhNhan_Id,
	RIGHT (bn.MaYTe, 8) AS MaYTe,
	bn.TenBenhNhan,
        tn.DiaChiLienHe as TN_diachi,
	bn.DiaChi BN_diachi,
	tn.TinhThanh_Id AS TN_TinhThanhID,
	bn.TinhThanh_Id AS BN_TinhThanhID,
	t.TenDonVi AS TN_TenTinhThanh,
	bn_t.TenDonVi AS BN_TenTinhThanh,
	t.MaDonVi AS TN_MaTinhThanh,
	bn_t.MaDonVi AS BN_MaTinhThanh,
	t.TamNgung AS TN_T_TamNgung,
	bn_t.TamNgung AS BN_T_TamNgung,
	tn.QuanHuyen_Id AS TN_QuanHuyenID,
	bn.QuanHuyen_Id AS BN_QuanHuyenID,
	q.TenDonVi AS TN_TenQuan,
	bn_q.TenDonVi AS BN_TenQuan,
	q.MaDonVi AS TN_MaQuan,
	bn_q.MaDonVi AS BN_MaQuan,
	q.TamNgung AS TN_Q_Ngung,
	bn_q.TamNgung AS BN_Q_Ngung,
	tn.XaPhuong_Id AS TN_XaPID,
	bn.XaPhuong_Id AS BN_XaPID,
	x.TenDonVi AS TN_TenXaP,
	bn_x.TenDonVi AS BN_TenXaP,
	x.MaDonVi AS TN_MaXP,
	bn_x.MaDonVi AS BN_MaXP,
	x.TamNgung AS TN_XP_Ngung,
	bn_x.TamNgung AS BN_XP_Ngung
FROM
	dbo.TiepNhan AS tn
LEFT JOIN dbo.DM_BenhNhan AS bn ON tn.BenhNhan_Id = bn.BenhNhan_Id
LEFT JOIN dbo.DM_DonViHanhChinh AS t ON tn.TinhThanh_Id = t.DonViHanhChinh_Id
LEFT JOIN dbo.DM_DonViHanhChinh AS q ON tn.QuanHuyen_Id = q.DonViHanhChinh_Id
LEFT JOIN dbo.DM_DonViHanhChinh AS x ON tn.XaPhuong_Id = x.DonViHanhChinh_Id
LEFT JOIN dbo.DM_PhongBan ON tn.NoiTiepNhan_Id = dbo.DM_PhongBan.PhongBan_Id
LEFT JOIN DM_DonViHanhChinh bn_t ON bn.TinhThanh_Id = bn_t.DonViHanhChinh_Id
LEFT JOIN DM_DonViHanhChinh bn_q ON bn.QuanHuyen_Id = bn_q.DonViHanhChinh_Id
LEFT JOIN DM_DonViHanhChinh bn_x ON bn.XaPhuong_Id = bn_x.DonViHanhChinh_Id
LEFT JOIN dbo.me_User ON tn.NguoiCapNhat_Id = dbo.me_User.User_id
WHERE	tn.SoTiepNhan IN ($tnqr)";
//$sql_count = "SELECT COUNT(*) FROM TiepNhan AS count ";
 
 
//$totalCount = \Yii::$app->db2->createCommand($sql_count)->queryScalar();
$dataProvider = new SqlDataProvider([
'db'=>'db2',
'sql' => $sql,
// 'totalCount' => $totalCount,
'totalCount' => 50,
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
