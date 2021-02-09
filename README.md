# weekly_report

## 環境構築
`laravel/"配下`と`"/"配下`に設定ファイルを配置します。<br>
※設定ファイルは別で保管しております

### docker環境設定
Docker Desktop がインストールされている事が前提となります。DLリンクは以下です。<br>
[https://www.docker.com/get-started](https://www.docker.com/get-started)

docker-compose.ymlが存在するディレクトリに移動して以下のコマンドを実行します<br>
```
■サービスのビルドを実行
docker-compose build --no-cache

■コンテナ起動
docker-compose up -d

■php-fpmへログイン
docker-compose exec php-fpm /bin/bash

```
### php-fpm環境設定
```
■フレームワークインストール
composer install

■キャッシュとアプリキー設定
php artisan config:cache
php artisan key:generate
php artisan config:cache

■権限設定
chmod -R 777 ./storage/

■マイグレーション
php artisan migrate

```

■ laravel/ui インストール
```
composer require laravel/ui:~2.0


※composer require laravel/uiは失敗します
https://tech.quartetcom.co.jp/2015/01/19/composer-practices/

php artisan ui bootstrap --auth
※【認証機能の有効化について（公式）】
※https://readouble.com/laravel/7.x/ja/authentication.html
※Reactは後から追加するので一旦bootstrapを入れます
```

■NPM LaravelMIXインストール
```
apt update
apt install nodejs npm
npm install
npm run dev
```

■ブラウザでlocalhostにアクセスして確認

localhostでアクセスLaravelのデフォルトページが開かれればOK
