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
                <form id="title_form" name="title_form" action="{{ route('delete') }}" method="POST" class="sidebar-form">
                    {{ csrf_field() }}
                    <div id="databutton" style="text-align:right;">
                        <input type="button" class="btn btn-primary" style="margin-bottom: 20px;" id="add"
                            name="add" value="新增" onclick="window.location='{{ route('getAdd') }}'">
                        <input type="submit" class="btn btn-danger" style="margin-bottom: 20px;" id="delete" 
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
                            @foreach ($titles as $title)
                                <tr>
                                    <td class="ti_id">{{ $title->id }}</td>
                                    <td><input type="checkbox" name='ti_id[]' value={{ $title->id }}></td>
                                    <td>{{ $title->category }}</td>
                                    <td>{{ $title->name }}</td>
                                    <td>{{ $title->text }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="update" name="update" onclick="javascript:location.href ='{{route('getUpdate', $title->id)}}'">
                                            編輯
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
            </div>
        </div>
        <div id="app">
            {{ @message }}
        </div>
        {{-- <form action="{{ route('my_route', ['q' => '4']) }}" method="post" id="search">
        </form> --}}
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/manifest.js')}}"></script>
        <script src="{{mix('js/vendor.js')}}"></script>
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    message: 'Hello Vue!'
                }
            })

        </script>
    </body>
</html>