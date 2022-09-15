<html>
    <head>
        <title>@yield('title')</title>        
        @yield('stylesheet')
    </head>
    <body>
        <div>
            <a href="/typingSite/mst/list" class="to-list">一覧</a>
            <a href="/typingSite/mst/register" class="to-regist">登録</a>
            <a href="/typingSite/mst/edit" class="to-edit">編集</a>
            <a href="/typingSite/mst/delete" class="to-del">削除</a>   
        </div>
        @yield('content')
    </body>
</html>