<html>
<style>
    .vertical-center {
        min-height: 100%; /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-) */
        
        display: flex;
        align-items: center;
    }
    
    .jumbotron{
        height:100%;
        width:100%;
        overflow-x: scroll;
    }
    
    .container{
        padding-right: 0px;
        padding-left: 0px;
    }
    
    #title,.table_text,#collapse_title{
        font-family:'微軟正黑體';
    }
    
    .sky{
        background-color:#286DA8;
    }
    
    .tx-carbon{
        color:#5f5f5f;
    }
    
    a,.tx-watermelon{
        color:#324fe1;
    }
    
    .nav-tabs {
        border-color: #e2e2e6;
        background-color: #f4f4f4;
        border-bottom-width: 1px;
        zoom: 1;
        border-width: 0;
        border-style: solid;
    }
    
    a.nav-link.active.show{
        background-color:#286DA8;
    }
    
    a.nav-link{
        background-color:#ffffff;
    }
    
    #accordion{
        border-width: 1px;
        border-style: solid;
        border-color: #e2e2e6;
    }
    
    .nav-item{
        width:16%;
        border-left: 1px solid transparent;
        border-right: 1px solid transparent;
        text-align: center;
        padding-bottom: 2px;
    }
    
    .today-tab{
        font-weight: 700;
        border-top-width: 3px;
        border-top-style: solid;
        border-color: transparent
    }
    
    .active{
        border-right-color: #d6d6d6;
        border-bottom: 1px solid #fff;
        background-color: #fff;
        margin-bottom: -1px;
        color: #286DA8!important;
        border-bottom: 0;
        border-top-color: #286DA8;
        font-weight: 700;
        border-top-style: solid;
        border-color: transparent
    }
    
    
    .collapse_title{
        height: 224px;
        ackground-color: #fff;
    }
    
    
    .card{
        border: 0px;
    }
    
    .nav-tabs .nav-link.active{
        border-top-width: 3px;
        border-top-color: #286DA8;
    }
    
    .nav-tabs,#collapse_title{
        width: 633px;
    }
    
    .tab-pane.active{
        z-index: 2;
        margin-top: 0;
        margin: 0;
    }
    
    .title-cor{
        color:#286DA8;
    }
    
    .title-img{
        z-index: 1;
        position: absolute;
        height: 210px;
        top: 14px;
        left: 12px;
        border: 1px solid rgb(226, 226, 228);
        list-style:none;
    }
    
    .tab-data{
        position: relative;
        letter-spacing: normal;
        line-height: 1;
        display: inline-block;
        float: right;
    }
    
    .img-link,.img-alt{
        position:relative;
    }
    
    .img-alt{
        top: -45px;
    }
    
    .img-text{
        font-size: 24px;
        color: #fff!important;
        padding-right: 14px;
        padding-left: 14px;
        text-decoration: none;
        letter-spacing: normal;
    }
    
    .tab-text{
        width: 284px;
        float: right;
        position: relative;
        padding-top: 15px;
        display: block;
        margin-left: 20px;
        margin-right: 8px;
        margin-bottom: 6px;
    }
    
    .Va-tt{
        vertical-align: text-top;
        text-rendering: auto;
    }
    
    .card-text{
        margin-top: 0;
        margin-left: 32px;
        margin-right: 8px;
        line-height: 1;
        font: 13px/1.25 'Helvetica Neue',Helvetica,Arial,sans-serif;
    }
    
    .story-title{
        margin-top: 0;
        margin-left: 32px;
        margin-right: 8px;
    }
    
    .ImageLoader-Delayed{
        width: 100%;
        display: block;
    }
    
    .MainStoryImage{
        width: 350px;
        background-size: cover;
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
                    <input type="button" class="btn btn-primary" style="margin-bottom: 20px;" id="add" name="add"
                        value="新增" onclick="window.location='{{ route('getAdd') }}'">
                    <input type="submit" class="btn btn-danger" style="margin-bottom: 20px;" id="delete" name="delete"
                        value="刪除">
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
                            <td>{{ $title->categorys->name }}</td>
                            <td>{{ $title->name }}</td>
                            <td>{{ $title->text }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" id="update" name="update"
                                    onclick="javascript:location.href ='{{route('getUpdate', $title->id)}}'">
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