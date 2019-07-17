<html>
    <link rel="stylesheet" href="/css/admin.css">
    <style>
        .bg-form{
            min-height: 100%; /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-) */
            font-family:'微軟正黑體';
            display: flex;
            align-items: center;
        }

        .box-header{
            font-size: 22px;
        }

        .text-label{
            font-size: 18px;
        }

        .btn{
            font-size: 16px;
        }
    </style>
    <body>
        <div class="container bg-form" style="width:500px;">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    新增使用者
                </div>
                <div class="box-body">
                    <form action="{{URL::to('/form')}}" method="POST" class="sidebar-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="text-black font-weight-bold text-label">名稱：</label>
                            <input type="text" name="name" class="form-control" placeholder="請輸入2~5名稱" value="">
                        </div>
                        <div class="form-group">
                            <label for="account" class="text-black font-weight-bold text-label">帳號：</label>
                            <input type="text" name="account" class="form-control" placeholder="請輸入8~15數字與英文" value="">
                        </div>
                    
                        <div class="form-group">
                            <label for="password" class="text-black font-weight-bold text-label">密碼：</label>
                            <input type="password" name="password" class="form-control" placeholder="請輸入8~15數字與英文" value="">
                        </div>

                        <div class="col text-center">
                            <button type="submit" name="search" id="search-btn" class="btn btn-primary">註冊</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>