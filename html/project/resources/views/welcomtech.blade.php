<!DOCTYPE html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
</head>
<title>Laravel</title>
<body>
    <h1>取得データ {{ $title }}</h1>
    <table>
        <tr>
            <th>id</th>
            <th>user_id</th>
            <th>deploy_cd</th>
            <th>assignmentdate</th>
            <th>update_by</th>
        </tr>
    @if(isset($tabledata))
        @foreach($tabledata as $data)
            @if($loop->last && $addsingle)
            <tr class="addsingle">
            @else
            <tr>
            @endif
                <td>{{ $data -> id}}</td>
                <td>{{ $data -> user_id}}</td>
                <td>{{ $data -> deploy_cd}}</td>
                <td>{{ $data -> assignmentdate}}</td>
                <td>{{ $data -> update_by}}</td>
            </tr>
            
        @endforeach
    @endif
    </table>
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

        <!-- Update -->
        <form action="/goods_masters" method="post" id="Update">
            @csrf
            axreq:Update<input type="hidden" name="axreq" value="Update"><br>
            id:<input type="lavel" name="id" value="1">
            user_id:<input type="lavel" name="user_id" value="">
            deploy_cd:<input type="lavel" name="deploy_cd" value="">
            assignmentdate:<input type="lavel" name="assignmentdate" value="">
            update_by:<input type="lavel" name="update_by" value="">

            <input type="submit" value="送信" form="Update">
        </form>

        <!-- AddSingle -->
        <form action="/goods_masters" method="post" id="AddSingle">
            @csrf
            axreq:AddSingle<input type="hidden" name="axreq" value="AddSingle"><br>
            id:<input type="lavel" name="id" value={{$addsingle_id}} readonly>
            user_id:<input type="lavel" name="user_id" value="">
            deploy_cd:<input type="lavel" name="deploy_cd" value="">
            assignmentdate:<input type="lavel" name="assignmentdate" value="">
            update_by:<input type="lavel" name="update_by" value="">

            <input type="submit" value="送信" form="AddSingle">
        </form>
    </body>
</html>
