[環境構築]
○ドッカー起動
docker-compose up -d

○laravelインストール
docker compose exec app_laravel_project composer create-project --prefer-dist laravel/laravel project

○権限オール7
docker compose exec -w /var/www/html app_laravel_project chmod -R 777 project

○.env書き換え
html\project\.envのDBの値を変更する
DB_CONNECTION=mysql
DB_HOST=db-host
DB_PORT=14406
DB_DATABASE=laravel_db
DB_USERNAME=root
DB_PASSWORD=root

○DB接続確認(マイグレ実行)
docker compose exec -w /var/www/html/project app_laravel_project php artisan migrate
→エラーが出る場合は以下を打ってみる
docker compose exec -w /var/www/html/project app_laravel_project php artisan migrate:fresh

[DB作成]
○テーブルの定義を行う
docker compose exec -w /var/www/html/project php artisan make:model -m XXX
→project/app/Models/XXX.php　が出来る
→project/database/migrations/yyyy_mm_dd_XXXXXX_create_XXX_table.php　が出来る

project/database/migrations/yyyy_mm_dd_XXXXXX_create_XXX_table.php　にカラムを記載する

○テーブル作成実行
docker compose exec -w /var/www/html/project php artisan migrate

○ダミーデータを作成する
docker compose exec -w /var/www/html/project php artisan make:seeder XXXs
→project/database/seeders/XXXs.php　が出来る
　ここのrun()にダミーデータを記載する(便利機能：モデルファクトリ)
　use App\Models\XXX;　の記述が必要

project/database/seeders/DatabaseSeeder.phpn以下を追記する。
        $this->call([
            XXX::class,
        ]);

○ダミーデータ作成実行
docker compose exec -w /var/www/html/project php artisan db:seed
docker compose exec -w /var/www/html/project php artisan db:seed --class=XXXSeeder
→phpmyadmin見るとデータが増えている

[コントローラ作成]
○初期関数あり
docker compose exec -w /var/www/html/project php artisan make:controller XXXController

○DBと紐づけ
docker compose exec -w /var/www/html/project php artisan make:controller XXXController --model=XXX --resource

○web.php修正
use App\Http\Controllers\XXXController;
Route::resource('XXX', XXXController::class);

○web.config修正うまくいっているか確認(ルート確認)
docker compose exec -w /var/www/html/project php artisan route:list

[ubuntu設定]　※文字コードをutf-8にする
# 1．パッケージ情報の更新
sudo apt update
sudo apt upgrade

# 2．日本語言語パックのインストール
sudo apt -y install language-pack-ja

# 3．ロケールを日本語に設定
sudo update-locale LANG=ja_JP.UTF8

# 4．ここでいったん終了してから、Ubuntuを再起動

# 5．タイムゾーンをJSTに設定
sudo dpkg-reconfigure tzdata

# 6．日本語マニュアルのインストール
sudo apt -y install manpages-ja manpages-ja-dev

