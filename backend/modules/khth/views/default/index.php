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
$this->registerJsFile(\Yii::$app->request->BaseUrl."/backend/assets/treeview/jquery-2.1.1.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(\Yii::$app->request->BaseUrl."/backend/assets/treeview/bootstrap-treeview.min.css",[ 'depends' => [\yii\bootstrap\BootstrapAsset::className()], 'media' => 'screen', ]);
 $this->registerJsFile(\Yii::$app->request->BaseUrl."/backend/assets/treeview/bootstrap-treeview.min.js", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

 ?>
<div class="row"> <div class="col-sm-4"><div id="treeview-checkable" class=""></div></div><div class="col-sm-6"><div>
                           <div class='row'><h2 class='col-sm-4'>Đã Chọn :<span id='users'></span>  </h2> <button id='createdtask'  disabled='disabled' type='button' class='col-sm-4 btn btn-success'>Xác Nhận</button></div><hr>
                           <div id="users-task" class="form-group"></div>
                         </div>
                          </div> </div>

<script type="text/javascript">

                window.onload = function() {

                var listtasku = {};
                        $.ajax({
                        url: "/users/list",
                                dataType: "json",
                                success: function(mydata){

                                treeview(mydata);
                                } });
                        function createdTask(){



                        }    // Some logic to retrieve, or generate tree structure
                $("#createdtask").on("click", function() {
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
                        function treeview(mydata){


                        var $checkableTree = $('#treeview-checkable').treeview({
                        data: mydata,
                                showIcon: true,
                                showTags: true,
                                showCheckbox: true,
                                levels:1,
    //                                  collapseIcon: 'glyphicon glyphicon-chevron-down',

                                nodeIcon: "glyphicon glyphicon-user",
                                multiSelect: true,
                                onNodeChecked: function(event, node) {
    //                                    $('#checkable-output').prepend('<p>' + node.nodeId + node.text + ' was checked</p>');
                                if (!!node.nodes?.length){
                                $checkableTree.treeview('expandNode', [ node.nodeId, { silent: true } ]);
                                        $checkableTree.treeview('checkNode', [ node.nodeId, { silent: true } ]);
                                        node.nodes.forEach((item) => {
                                        $checkableTree.treeview('checkNode', [ item.nodeId, { silent: true } ]);
                                                $checkableTree.treeview('selectNode', [ item.nodeId, { silent: true } ]);
                                        });
                                }
                                getcheck();
                                },
                                onNodeUnchecked: function (event, node) {
                                if (!!node.nodes?.length){
                                node.nodes.forEach((item) => {

                                $checkableTree.treeview('uncheckNode', [ item.nodeId, { silent: true } ]);
                                        $checkableTree.treeview('unselectNode', [ item.nodeId, { silent: true } ]);
                                });
                                        getcheck();
                                }
    //                                    $('#checkable-output').prepend('<p>' + node.nodeId + node.text + ' was unchecked</p>');
                                },
                                onNodeSelected: function(event, node) {
    //                                           console.log());
                                if (!node.nodes?.length){

                                $checkableTree.treeview('checkNode', [ node.nodeId, { silent: true } ]);
                                } else{
                                $checkableTree.treeview('expandNode', [ node.nodeId, { silent: true } ]);
                                }
    //                                   $checkableTree.treeview('checkNode', [ checkableNodes, { silent: $('#chk-check-silent').is(':checked') }]);
    //                                   $('#checkable-output').prepend('<p>' + node.nodeId + node.text + ' was selected</p>');
                                getcheck();
                                },
                                onNodeUnselected: function (event, node) {
                                if (!node.nodes?.length){
                                $checkableTree.treeview('uncheckNode', [ node.parentId, { silent: true } ]);
                                        $checkableTree.treeview('uncheckNode', [ node.nodeId, { silent: true } ]);
                                }
    //                                    $checkableTree.treeview('uncheckNode', [ node.nodeId, { silent: true } ]);
    //                                    $('#checkable-output').prepend('<p>' + node.text + ' was unselected</p>');
                                getcheck();
                                }

                        });
                        };
                        function getcheck(){
                        let ids = [];
                                let users = [];
                                $('#treeview-checkable').treeview('getChecked', 0).forEach((item) => {
                        if (item.parentId != undefined){
                        ids.push(item.nodeid);
                                users.push(item.text);
                        }
    //                        
                        });
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
                        }

                }
    </script>

 