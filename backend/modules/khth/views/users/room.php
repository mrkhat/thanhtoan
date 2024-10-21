<?php

use kartik\select2\Select2;

$url2 = \yii\helpers\Url::to(['/room/list']);

use yii\web\JsExpression;
?>
<div class="dntt-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
<?php
$this->registerJsFile(\Yii::$app->request->BaseUrl . "/backend/assets/treeview/jquery-2.1.1.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(\Yii::$app->request->BaseUrl . "/backend/assets/treeview/bootstrap-treeview.min.css", [ 'depends' => [\yii\bootstrap\BootstrapAsset::className()], 'media' => 'screen',]);
$this->registerJsFile(\Yii::$app->request->BaseUrl . "/backend/assets/treeview/bootstrap-treeview.min.js", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="form-group">
    <?php
    $formatJs = <<< 'JS'
         var listtasku = [];
         var listsysgroup=[];
         var listsysGroupUser=[];
         var listsysgroup2=[];
          function treeviewlist(mydata,idtab){

                        var $checkableTree = $(idtab).treeview({
                                data: mydata,
                                showIcon: true,
                                showCheckbox: true,
                                showTags: false,
                                levels:2,
                                nodeIcon: "glyphicon glyphicon-user",
                                multiSelect: true,

                                onNodeSelected: function(event, node) {
    //                          
                                getcheck();
                                },
                                onNodeUnselected: function (event, node) {
                          
                                getcheck();
                                }
                        });
                        };
                           function treeviewuser(mydata,idtab){

                        $(idtab).treeview({
                                data: mydata,
                                showIcon: true,
                                showTags: false,
                                multiSelect: true,
                                levels:2,})
                  
                      
                        };
                        function getcheck(){
                       
                        let ids = [];
                                let users = [];
                         $('#treeview-checkable').treeview('getSelected', 0).forEach((item) => {
//                        if (item.parentId != undefined){
                              ids.push(item.id);
                                users.push(item.text);
//                        } 
//                             
//                               console.log(item.id);  
                        });  ;
                                lg = users.length;
                                $('#users').html(users.length);
                                if (!users.length){
                        $('#createdtask').html('Chưa chọn tài khoản');
                                $('#createdtask').attr("disabled", true);
                        } else {
                        $('#createdtask').html('Xác nhận Phân Công Công Việc');
                        $('#createdtask').attr("disabled", false); }
                        $('#users-task').html("");
                                users.forEach((item) => {

                                $('#users-task').append(' <button type="button" class="btn btn-warning">' + item + '</button> ');
                                });
                                listtasku = ids;
                                   console.log(listtasku)
                        }
                       
//
            
                        function getsysgroup(userid){
                        $.ajax({
                        type: 'post',
                        url: 'listpb',
                        data: {q:userid },
                        success: function(mydata){
                         listsysgroup2=listsysgroup;
                        listsysGroupUser=mydata;
                        mydata.forEach((item) => {
                        listsysgroup2=  listsysgroup2.filter(val => val.id !== item.id) ;
//                         listtasku.push(item.id);
                                       });
//                         console.log(listsysgroup);
                         treeviewuser(listsysgroup2,'#treeview-checkable');
                         treeviewuser(mydata,'#users-groub');
                       },
                        dataType: 'json',
                        });
                        }
JS;
    $this->registerJs($formatJs, $this::POS_HEAD);
    echo Select2::widget([
        'name' => 'kv-repo-template',
//    'value' => 21287, 
        'value' => 21287,
        'initValueText' => 'kartik-v/yii2-widgets',
        'options' => ['placeholder' => 'Search for a repo ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'ajax' => [ 'url' => 'listusers',
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term,g:1}; }'),
//  
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return  markup}'),
            'templateResult' => new JsExpression('function(users) { return users.status==0?"<span>" +users.name + " - " +users.code +"</span>":"<code stytle=\"color:red\"><i>" +users.name + " - " +users.code +"</i></code>"} '),
            'templateSelection' => new JsExpression('function (users) {'
//                .'console.log(  users.id +" sss" );'
                    . 'userid=users.id;  '
                    . 'getsysgroup(users.id); '
                    . ' $("#user-select").html(users.status==0?"<span id=\"user-id\">"+users.id +"</span> <span>" +users.name + " - " +users.code +"</span>":"<code stytle=\"color:red\"><i>"+users.id +" "  +users.name + " - " +users.code +"</i></code>");'
                    . ' return users.status==0?"<span>" +users.name + " - " +users.code +"</span>":"<code stytle=\"color:red\"><i>" +users.name + " - " +users.code +"</i></code>"} '),
        ],
    ]);
    ?>
</div>

<div class="row">       
    <div class="col-sm-4">
        <div class="form-group">
            <label for="input-check-node" class="sr-only">Search Tree:</label>
            <input type="input" class="form-control" id="input-check-node" placeholder="Identify node..." value="">
            <hr>
            <div class="form-group"> 
                <button type="button" class="btn btn-danger select-node" id="btn-unselect-node" >Unselect Node</button>
            </div>
        </div>
        <div id="treeview-checkable" class=""></div></div>
    <div class="col-sm-6"><div>
            <div class="col-sm-4"><div id="user-select" class=""></div></div>    
            <div class='row'><h2 class='col-sm-4'>Đã Chọn :<span id='users'></span>  </h2>
                <button id='add-sys-group'    type='button' class='col-sm-4 btn btn-success'>Thêm</button>
                <button id='remove-sys-group'    type='button' class='col-sm-4 btn btn-success'>Xóa</button>
                <button id='createdtask'  disabled='disabled' type='button' class='col-sm-4 btn btn-success'>Xác Nhận</button>
            </div>
            <hr>
            <div class="form-group">
                <button type="button" class="btn btn-danger select-node" id="users-unselect-node" >Unselect Node</button>
            </div>
            <div id="users-groub" class="form-group"></div>
            <div id="users-task" class="form-group"></div>
        </div>
    </div> </div>



<script type="text/javascript">
    window.onload = function() {


    $('#input-check-node').on('keyup', function (e) {
    selectableNodes = findSelectableNodes();
            if ($('#input-check-node').val().length){
    $('#treeview-checkable ul li').hide();
            $('.search-result').show();
    } else{
    $('#treeview-checkable ul li').show();
    }
    });
            $('#btn-unselect-node').on('click', function (e) {
    $('#treeview-checkable').treeview('unselectNode', [ $('#treeview-checkable').treeview('getSelected', 0), { silent: true }]);
    });
            $('#users-unselect-node').on('click', function (e) {
    $('#users-groub').treeview('unselectNode', [ $('#users-groub').treeview('getSelected', 0), { silent: true }]);
    });
            var findSelectableNodes = function() {

            return $data = $('#treeview-checkable').treeview('search', [ $('#input-check-node').val(), { ignoreCase: true, exactMatch: false}]);
            };
            var userid = 0;
            $.ajax({
            url: "listpb",
                     dataType: "json",
                    success: function(mydata){
                    data1 = $('#users-groub').treeview('getEnabled', 0);
                     
//                            alert();
//                            data1.forEach((item) => {
//                            mydata = mydata.filter(val => v al.id !== item.id);
// 
//                            });
  
                            treeviewuser(mydata, '#treeview-checkable');
                     } });
            function createdTask(){
            }    // Some logic to retrieve, or generate tree structure


    $("#add-sys-group").on("click", function() {

//                        console.log( $('#treeview-checkable').treeview('getSelected', 0));

    data1 = $('#treeview-checkable').treeview('getSelected', 0);
            data2 = $('#treeview-checkable').treeview('getUnselected', 0);
            data3 = $('#users-groub').treeview('getEnabled', 0);
            usersgroub = data3.concat(data1);
//                         console.log( listsysGroupUser);
            data2 = data2.sort((a, b) => (parseInt(a.id) > parseInt(b.id) ? 1 : - 1));
            usersgroub = usersgroub.sort((a, b) => (parseInt(a.id) > parseInt(b.id) ? 1 : - 1));
            treeviewuser(usersgroub, '#users-groub');
            treeviewuser(data2, '#treeview-checkable');
            $('#createdtask').attr("disabled", false);
    });
            $("#remove-sys-group").on("click", function() {
    data1 = $('#users-groub').treeview('getSelected', 0);
            data2 = $('#users-groub').treeview('getUnselected', 0);
            data3 = $('#treeview-checkable').treeview('getEnabled', 0);
//                          console.log( data);

            treeview = data3.concat(data1);
            data2 = data2.sort((a, b) => (parseInt(a.id) > parseInt(b.id) ? 1 : - 1));
            treeview = treeview.sort((a, b) => (parseInt(a.id) > parseInt(b.id) ? 1 : - 1));
//                           console.log( listsysGroupUser);
            treeviewuser(data2, '#users-groub');
            treeviewuser(treeview, '#treeview-checkable');
            $('#createdtask').attr("disabled", false);
    });
            $("#createdtask").on("click", function() {
    let groubid = [];
            let userid = $('#user-id').html();
            console.log(userid);
            if (userid > 1){
    data = $('#users-groub').treeview('getEnabled', 0);
            data.forEach((item) => {
            groubid.push([userid, item.id])
                    $('#createdtask').attr("disabled", true);
            })
            console.log(groubid);
//                    $.ajax({
//                type: "POST",
////                        url: 'updatesysusergroup',
//                        data: {q:groubid,uid:userid },
//                        success: function(mydata){
////                        $('#createdtask').html('Đã xác nhận thành công');
////                                $('#createdtask').attr("disabled", true);
//                        },
//                        dataType: "json",
//                        });


    } else {alert('Tài Khoản Không Khả Dụng')}
//                $.ajax({
//                type: "POST",
//                        url: '/task/createlist',
//                        data: {id:listtasku, vid: },
//                        success: function(mydata){
//                        $('#createdtask').html('Đã xác nhận thành công');
//                                $('#createdtask').attr("disabled", true);
//                        },
//                        dataType: "json",
//                        });
    });
//                        function treeview(mydata){
//
//                        var $checkableTree = $('#treeview-checkable').treeview({
//                                data: mydata,
//                                showIcon: true,
//                                showTags: false,
//                                levels:2,
//                                nodeIcon: "glyphicon glyphicon-user",
//                                multiSelect: true,
//
//                                onNodeSelected: function(event, node) {
//    //                          
//                                getcheck();
//                                },
//                                onNodeUnselected: function (event, node) {
//                          
//                                getcheck();
//                                }
//
//                        });
//                        };
//                   function getcheck(){
////                       alert(listsysgroup)
////                        console.log('xxxxx');  
////                           console.log(listsysgroup);  
//                        
    }


</script>