<html>

<head>
    <title>App Name - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @section('sidebar')
    This is the master sidebar.
    @show

    @section('sidebar2')
    This is the master sidebar2.
    @show

    <div class="container">
        @yield('content')
    </div>

    <div id="app-3">
        <p v-if="seen">现在你看到我了</p>
    </div>
    <script src="{{mix('js/manifest.js')}}"></script>
    <script src="{{mix('js/vendor.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script>
        var app3 = new Vue({
            el: '#app-3',
            data: {
                seen: true
            }
        })
    
    </script>
</body>

</html>