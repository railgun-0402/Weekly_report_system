# weekly_report

## 環境構築

docker-compose.ymlが存在するディレクトリに移動して以下のコマンドを実行
```
■サービスのビルドを実行
docker-compose build --no-cache

■コンテナ起動
docker-compose up -d

■php-fpmへログイン
docker-compose exec php-fpm /bin/bash
```
### php-fpm環境設定
■フレームワークインストール
```
composer install
```
■\laravel\配下にenvファイルを設置する

■キャッシュファイル作成とAPPキー生成
```
php artisan config:cache && php artisan key:generate && php artisan config:cache
```
■DBマイグレーション（接続確認）
```
php artisan migrate:fresh
```
■データをシードする場合
```
php artisan migrate:fresh --seed
```

■必要であれば以下実施（clone元で実行されていればやらなくてOK）
```
composer require laravel/ui:~2.0
php artisan ui bootstrap --auth
```

■必要であれば以下実施（clone元で実行されていればやらなくてOK）
```
apt update
apt install nodejs npm
npm install
npm run dev
```
