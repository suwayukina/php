
http://localhost:7008/top　で操作ページにアクセス

○全データ取得する
１，axreq:Allの送信ボタンを押下。

結果　OfficeMasterテーブルの全レコードが表示される。


○対象のレコードを取得する
１，フィールドにIDを入力。
２，axreq:Singleの送信ボタンを押下。

結果　OfficeMasterテーブルの指定レコードが表示される。


○対象のレコードの値を更新する
１，フィールドにID＋更新するフィールドに値を入力。
（空欄の場合そのフィールドの変更なし）
（指定したIDがテーブルに無いと更新しない）
２, axreq:Updateの送信ボタンを押下。

結果　OfficeMasterテーブルの更新されたレコードが表示される。


○レコードを追加する
１，全フィールドに値を入力。
（IDは自動で割り振られる）
２, axreq:AddSingleの送信ボタンを押下。

結果　OfficeMasterテーブル全レコード＋追加されたレコード（ピンク色のレコード）が表示される。

テーブルの確認↓
http://localhost:4501/index.php?route=/sql&pos=0&db=laravel_db&table=office_masters


テーブルの外部キー設定確認↓
http://localhost:4501/index.php?route=/sql&pos=0&db=laravel_db&table=people
一番左の「usercd」カラムの値を押下すると親テーブル（office_mastersテーブル）の対応するレコードに飛ぶ