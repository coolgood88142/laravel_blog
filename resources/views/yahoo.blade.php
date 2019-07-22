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
                <form id="title_form" name="title_form" action="{{URL::to('/update')}}" method="POST" class="sidebar-form">
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
                                      $ti_id = $title->ti_id;
                                      $ti_category = $title->ti_category;
                                      $ti_name = $title->ti_name;
                                      $ti_text = $title->ti_text;

                                      $ti_array = ['ti_id' => $ti_id, 'ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text];
                                      $url = action('YahooController@UpdateTilie', $ti_array);
                            ?>
                                <tr>
                                    <td class="ti_id"><?php echo $ti_id;?></td>
                                    <td><input type="checkbox" name='ti_id[]' value=<?php echo $ti_id;?>></td>
                                    <td class="ti_category"><?php echo $ti_category;?></td>
                                    <td class="ti_name"><?php echo $ti_name;?></td>
                                    <td class="ti_text"><?php echo $ti_text;?></td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" id="update" name="update" value="編輯" onclick="window.location='{{ $url }}'"/>
                                    </td>
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

                    {{-- $('#update').submit(function() {
                        let tr = $(this).closest('tr');
                        let ti_no = $(tr).find(".ti_id").text().trim();
                        let ti_category = $(tr).find(".ti_category").text().trim();
                        let ti_name = $(tr).find(".ti_name").text().trim();
                        let ti_text = $(tr).find(".ti_text").text().trim();
                        
                        $("input[name='ti_no']").val(ti_no);
                        $("input[name='ti_category']").val(ti_category);
                        $("input[name='ti_name']").val(ti_name);
                        $("input[name='ti_text']").val(ti_text);
                        
                        document.title_form.action="{{URL::to('/update')}}";
                        document.title_form.submit();
                    }); --}}
            } );

            </script>
    </body>
</html>