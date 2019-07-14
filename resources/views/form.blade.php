<body>
    <div class="container">
        <div class="content">
           <form method="POST" action="{{URL::to('/form')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">請輸入名稱：</label>
                    <input type="text" name="name" class="form-control" value="">
                </div>
                <!--
                <div class="form-group">
                    <label for="account">請輸入帳號：</label>
                    <input type="account" name="account" class="form-control" value="{{ old('account') }}">
                </div>
            
                <div class="form-group">
                    <label for="password">請輸入密碼：</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>
            
                <div class="form-group">
                    <label for="password_confirmation">請輸入確認密碼：</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        value="{{ old('password_confirmation') }}">
                </div>
                -->
                <button type="submit" class="btn btn-primary">註冊</button>
            </form>
        </div>
    </div>
</body>