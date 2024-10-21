<?php

use common\components\Utils; ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!--  
        -->        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $avata = \Yii::$app->user->identity->attach;
                $avata = is_null($avata) ? 'noimage.jpg' : $avata;
                ?>
                <img src="<?= Utils::loadImage('avata/' . $avata) ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo trim(\Yii::$app->user->identity->first_name); ?>

                </p>
                <small><?= trim(Yii::$app->params['position'][\Yii::$app->user->identity->last_name]) ?> </small>

            </div>
        </div><!--
        -->

        <!-- search form -->
        <form action="/search" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="SearchSearch[name]" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <?php $user_role = \Yii::$app->user->identity->role; ?>
        <?php
        switch ($user_role) {
            case 10:
                ?>
                <?=
                dmstr\widgets\Menu::widget(
                        ['options' => ['class' => 'sidebar-menu'],
                            'items' => [
                                 ['label' => 'In Barcode', 'icon' => 'thermometer-half', 'url' => ['/device/barcode']],
                             ['label' => 'Mẫu Văn Bản', 'icon' => 'file', 'url' => ['/worklist/listfile']],
                                 ['label' => 'Tờ Trình', 'icon' => 'file', 'url' => ['/totrinh']],
                                ['label' => 'Q.Lý Công Việc', 'icon' => 'thermometer-half', 'url' => ['/worklist']],
                                ['label' => 'P.Giao Thiết Bi', 'icon' => 'bolt', 'url' => ['/bgtb']],
//                    ['label' =>'P.Nhập Thiết bị', 'icon' => 'bolt', 'url' => ['/nhaptb']],
                                ['label' => 'Q. May In', 'icon' => 'tint', 'url' => ['/mayin']],
                                ['label' => 'P.Sửa chữa máy in', 'icon' => 'tint', 'url' => ['/suachuathietbi']],
//                    ['label' => 'Q.Mặt Hàng', 'icon' => 'star', 'url' => ['/items']],
//                     ['label' => 'Q.Khoa Phòng', 'icon' => 'star', 'url' => ['/room']],
                                ['label' => 'Thiết bị', 'icon' => 'th', 'items' => [
                                        ['label' => 'Thiết Bị', 'icon' => 'desktop', 'url' => ['/device']],
                                        ['label' => 'Lý Lịch Máy', 'icon' => 'history', 'url' => ['/deviceh']]
                                    ]
                                ],
//                       ['label' => 'Đề Nghị Thanh Toán', 'icon' => 'money', 'url' => ['/dntt']],
                                ['label' => 'Quản trị viên', 'icon' => 'users', 'url' => ['/users/update?id=' . \Yii::$app->user->identity->id]],
                            ],
                        ]
                )
                ?>
                <?php
                break;
            case 20:
                ?>

                <?=
                dmstr\widgets\Menu::widget(
                        ['options' => ['class' => 'sidebar-menu'],
                            'items' => [
                              ['label' => 'In Barcode', 'icon' => 'thermometer-half', 'url' => ['/device/barcode']],
                                     ['label' => 'Mẫu Văn Bản', 'icon' => 'file', 'url' => ['/worklist/listfile']],
            
                                ['label' => 'Q.Lý Công Việc', 'icon' => 'thermometer-half', 'url' => ['/worklist']],
                                ['label' => 'P.Giao Thiết Bi', 'icon' => 'bolt', 'url' => ['/bgtb']],
                                ['label' => 'P.Nhập Thiết bị dự phòng', 'icon' => 'bolt', 'url' => ['/nhapthietbi']],
                                ['label' => 'Báo cáo chi tiết sử dụng TBDP', 'icon' => 'bolt', 'url' => ['/xuatduphong']],
                                
                                ['label' => 'Báo cáo chi tiết sử dụng TBDP', 'icon' => 'th', 'items' => [
                                ['label' => 'Báo cáo chi tiết sử dụng TBDP', 'icon' => 'bolt', 'url' => ['/xuatduphong']],
                                  ['label' => 'Báo cáo Xuất dự phòng', 'icon' => 'bolt', 'url' => ['/bcxdp']],
                                    ]
                                ],
                       
            
                                  ['label' => 'Tài sản cố định', 'icon' => 'desktop', 'url' => ['/tscd']],
                                
                                ['label' => 'Thiết bị', 'icon' => 'th', 'items' => [
                                        ['label' => 'Thiết Bị', 'icon' => 'desktop', 'url' => ['/device']],
                                        ['label' => 'Lý Lịch Máy', 'icon' => 'history', 'url' => ['/deviceh']],
                                   
                                    ]
                                ],
             
                                ['label' => 'Q.Mặt Hàng', 'icon' => 'star', 'url' => ['/items']],
                                ['label' => 'Q.Khoa Phòng', 'icon' => 'star', 'url' => ['/room']],
                            ],
                        ]
                )
                ?>
                <?php break;
            case 30:
                ?>
                <?=
                dmstr\widgets\Menu::widget(
                        ['options' => ['class' => 'sidebar-menu'],
                            'items' => [
                                   ['label' => 'In Barcode', 'icon' => 'thermometer-half', 'url' => ['/device/barcode']],
                                     ['label' => 'Mẫu Văn Bản', 'icon' => 'file', 'url' => ['/worklist/listfile']],
                                ['label' => 'Tờ Trình', 'icon' => 'file', 'url' => ['/totrinh']],
                                ['label' => 'Q.Lý Công Việc', 'icon' => 'thermometer-half', 'url' => ['/worklist']],
                                ['label' => 'P.Giao Thiết Bi', 'icon' => 'bolt', 'url' => ['/bgtb']],
                                ['label' => 'P.Nhập Thiết bị dự phòng', 'icon' => 'bolt', 'url' => ['/nhapthietbi']],
                                ['label' => 'Báo cáo chi tiết sử dụng TBDP', 'icon' => 'bolt', 'url' => ['/xuatduphong']],
                                
                                ['label' => 'Báo cáo chi tiết sử dụng TBDP', 'icon' => 'th', 'items' => [
                                ['label' => 'Báo cáo chi tiết sử dụng TBDP', 'icon' => 'bolt', 'url' => ['/xuatduphong']],
                                  ['label' => 'Báo cáo Xuất dự phòng', 'icon' => 'bolt', 'url' => ['/bcxdp']],
                                    ]
                                ],
                                ['label' => 'Q. May In', 'icon' => 'tint', 'url' => ['/mayin']],
                                ['label' => 'P.Sửa chữa máy in', 'icon' => 'tint', 'url' => ['/suachuathietbi']],
                                ['label' => 'Q.Mặt Hàng', 'icon' => 'star', 'url' => ['/items']],
                                ['label' => 'Q.Khoa Phòng', 'icon' => 'star', 'url' => ['/room']],
                                
                                ['label' => 'Thiết bị', 'icon' => 'th', 'items' => [
                                        ['label' => 'Thiết Bị', 'icon' => 'desktop', 'url' => ['/device']],
                                         ['label' => 'Tài sản cố định', 'icon' => 'desktop', 'url' => ['/tscd']],
                                        ['label' => 'Lý Lịch Máy', 'icon' => 'history', 'url' => ['/deviceh']]
                                    ]
                                ],
                                ['label' => 'Đề Nghị Thanh Toán', 'icon' => 'money', 'url' => ['/dntt']],
                                ['label' => 'Quản trị viên', 'icon' => 'users', 'url' => ['/users']],
                            ],
                        ]
                )
                ?>
        <?php } ?>
    </section>

</aside>
