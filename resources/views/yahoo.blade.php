<html>
    <style>
        .container{
            font-family:'微軟正黑體';
        }

        .ti_id{
            display:none;
        }
    </style>
    <body>
        <link rel="stylesheet" href="/css/admin.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <div class="container">
            <div class="content">
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">Yahoo標題資料</h2>
                <form id="title_form" action="" method="POST" class="sidebar-form">
                    {{ csrf_field() }}
                    <div id="databutton" style="text-align:right;">
                        <input type="button" class="btn btn-primary" style="margin-bottom: 20px;" id="add"
                            name="add" value="新增" onclick="window.location='{{ url('add') }}'">
                        <input type="submit" class="btn btn-primary" style="margin-bottom: 20px;" id="delete" 
                            name="delete" value="刪除">
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="ti_id"></th>
                                <th></th>
                                <th>類別</th>
                                <th>標題</th>
                                <th>文字</th>
                                <th>編輯設定</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                  foreach ($titles as $title) {
                            ?>
                            <tr>
                                <td class="ti_id"><?php echo $title->ti_id;?></td>
                                <td><input type="checkbox" name='ti_id[]' value=<?php echo $title->ti_id;?>></td>
                                <td><?php echo $title->ti_category;?></td>
                                <td><?php echo $title->ti_name;?></td>
                                <td><?php echo $title->ti_text;?></td>
                                <td><input type="submit" class="btn btn-primary" id="update" name="update" value="編輯"></td>
                            </tr>
                            <?php
                                 }
                             ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <script src="{{mix('js/app.js')}}"></script>
        <script type="javascript">
            $(document).ready(function() {
                    $('#example').DataTable();

                    swal("Title", "Text", "success");
            } );

            $('#delete').submit(function(){
                $('#title_form').prop('action', '/delete');
            });
            
            $('#update').submit(function(){
                $('#title_form').prop('action', '/update');
            });
            </script>
    </body>
</html>