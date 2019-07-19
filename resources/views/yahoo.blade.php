<html>

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
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>類別</th>
                        <th>標題</th>
                        <th>文字</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($titles as $title) {
                     ?>
                    <tr>
                        <td><?php echo $title->ti_category;?></td>
                        <td><?php echo $title->ti_name;?></td>
                        <td><?php echo $title->ti_text;?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{mix('js/app.js')}}"></script>
    <script type="javascript">
        $(document).ready(function() {
                $('#example').DataTable();

                swal("Title", "Text", "success");
            } );
        </script>
</body>

</html>