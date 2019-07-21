<html>
<link rel="stylesheet" href="/css/admin.css">
<style>
    .bg-form {
        min-height: 100%;
        /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh;
        /* These two lines are counted as one :-) */
        font-family: '微軟正黑體';
        display: flex;
        align-items: center;
    }

    .box-header {
        font-size: 22px;
    }

    .text-label {
        font-size: 18px;
    }

    .btn {
        font-size: 16px;
    }
</style>

<body>
    <div class="container bg-form" style="width:500px;">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                更新標題資料
            </div>
            <div class="box-body">
                <form action="{{URL::to('/update')}}" method="POST" class="sidebar-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="ti_category" class="text-black font-weight-bold text-label">類別：</label>
                        <select name="ti_category" class="form-control">
                            <option selected value="焦點">焦點</option>
                            <option value="運動">運動</option>
                            <option value="娛樂">娛樂</option>
                            <option value="FUN">FUN</option>
                            <option value="生活">生活</option>
                            <option value="影音">影音</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ti_name" class="text-black font-weight-bold text-label">標題：</label>
                        <input type="text" name="ti_name" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="ti_text" class="text-black font-weight-bold text-label">文字：</label>
                        <textarea name="ti_text" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col text-center">
                        <button type="submit" name="search" id="search-btn" class="btn btn-primary">確定</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>