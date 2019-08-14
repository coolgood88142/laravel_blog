<html>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
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
        width:342px;
    }
    
    .title-img-sub1{
        z-index: 1;
        position: absolute;
        height: 80px;
        border: 1px solid rgb(226, 226, 228);
        list-style:none;
        width:171px;
        float: right;
        left: 12px;
        top: 230px;
    }
    
    .title-img-sub2{
        z-index: 1;
        position: absolute;
        height: 80px;
        border: 1px solid rgb(226, 226, 228);
        list-style:none;
        width:171px;
        float: right;
        right: 279px;
        top: 230px;
    }

    .title_href{
        margin-top: 0;
        margin-left: 32px;
        margin-right: 8px;
    }
    
    .img-size{
        width:342px;
    }
    
    .img-size-sub{
        width:171px;
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
        font-size: 22px;
        color: #fff!important;
        padding-right: 14px;
        padding-left: 14px;
        text-decoration: none;
        letter-spacing: normal;
        text-shadow: 1px 1px rgba(0,0,0,.9);
        margin-top: 10px;
    }
    
    .img-text-sub{
        font-size: 14px;
        color: #fff!important;
        padding-right: 14px;
        padding-left: 14px;
        text-decoration: none;
        letter-spacing: normal;
        text-shadow: 0 1px 1px #000;
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
    <div class="jumbotron vertical-center bg-white">
        <div class="container" style="width: 635px;">
            <h2 id="title" class="text-center font-weight-bold title-cor">Yahoo 標題</h2>
            <div id="accordion">
                <ul class="nav nav-tabs">
                    @for ($i = 0; $i < count($categorys); $i++)
                        <li class="nav-item">
                            <span id="nav-{{ $i }}" class="nav-link text-dark today-tab" data-toggle="tab" href="#tab-{{ $i }}">
                                {{ $categorys[$i] }}
                            </span>
                        </li>
                    @endfor
                </ul>
                <div id="collapse_title" class="card collapse show">
                    <div class="card-block">
                        <div class="tab-content">
                            @for ($i = 0; $i < count($categorys); $i++)
                                <div class="tab-pane" id="tab-{{ $i }}">
                                    <ul>
                                        @php
                                            $sub_count = 0;
                                        @endphp
                                        @for ($j = ($i * 3); $j < ($i * 3) + 3; $j++)
                                            @php
                                                $sub = '';$img_sub = '';
                                            @endphp
                                                @if ($j != ($i * 3))
                                                    @php
                                                        $sub = '-sub';
                                                        $img_sub = $sub . $sub_count;
                                                    @endphp
                                                @endif
                                                <li class="title-img{{ $img_sub }}">
                                                    <a href="{{ $href[$j] }}" class="img-link">
                                                        <img src="{{ $src[$j] }}" class="img-size{{ $sub }}">
                                                    </a>
                                                    <a href="{{ $href[$j] }}" class="img-alt">
                                                        <p class="img-text{{ $sub }}">{{ $alt[$j] }}</p>
                                                    </a>
                                                </li>
                                            @php
                                                $sub_count++;
                                            @endphp
                                        @endfor

                                        @for ($k = ($i * 5); $k < ($i * 5) + 5; $k++)
                                            <li class="tab-data">
                                                <div class="tab-text">
                                                    <a href="{{ $link[$k] }}" class="title_href">
                                                        <span>{{ $title[$k] }}</span>
                                                    </a>
                                                    <p class="card-text tx-carbon">{{ $subtitle[$k] }}</p>
                                                </div>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div> 
            </div>
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
        $(document).ready(function() {
            $("#nav-0").addClass("active");
            $("#tab-0").addClass("active");
        });
        
        //標籤有[data-toggle="tab"]屬性，有滑鼠滑入時顯示tab區塊
        $(document).on('mouseenter', '[data-toggle="tab"]', function () {
            $(this).tab('show');
        });
    </script>
</body>

</html>