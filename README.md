# 週報システム

## 稼働環境

※社内NW上のWindowsServer2019にて稼働します。

| 配置先（社内） | URL |
|--|--|
| Windows Server 2019 | [http://192.168.21.251](http://192.168.21.251) |

## 環境構築手順
■サービスのビルドを実行
```
docker-compose build --no-cache
```

■コンテナ起動
```
docker-compose up -d
```

■コンテナ起動確認（mysql, php-fpm, nginx）
```
docker-compose ps
```

※mysqlコンテナが起動していなかったら以下実行
```
chmod -R 777 ./mysql/
```

■php-fpmへログイン
```
docker-compose exec php-fpm /bin/bash
```

■権限設定
```
chmod -R 777 ./storage/
```

■パッケージインストール
```
composer install
```

■envファイル配置<br>
※ページ下部に記載

■キャッシュファイル作成とAPPキー生成
```
php artisan config:cache && php artisan key:generate && php artisan config:cache
```

■マイグレーション
```
php artisan migrate
```

■必要に応じてlaravelUIとbootstrap導入
```
composer require laravel/ui:~2.0
php artisan ui bootstrap --auth
```

■必要に応じてフロントのモジュールインストール
```
apt update
apt install nodejs npm
npm install
npm run dev
```
■env情報
```
APP_NAME=週報システム
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=daily

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=weekly_reports
DB_USERNAME=weekly_report_user
DB_PASSWORD=tKsGcG9xKkR-

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=30

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
以上
