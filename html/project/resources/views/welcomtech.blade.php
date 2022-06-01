<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
    <h1>取得データ {{ $title }}</h1>
        <!-- All -->
        <form action="/goods_masters" method="post" id="All">
            @csrf
            axreq:All<input type="hidden" name="axreq" value="All">
            <input type="submit" value="送信" form="All"><br>
        </form>

        <!-- Single -->
        <form action="/goods_masters" method="post" id="Single">
            @csrf
            axreq:Single<input type="hidden" name="axreq" value="Single"><br>
            id:<input type="lavel" name="id" value="1">
            <input type="submit" value="送信" form="Single">
        </form>
    </body>
</html>
