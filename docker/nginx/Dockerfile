FROM nginx:1.18-alpine

# タイムゾーンをAsia/Tokyoに指定
ENV TZ='Asia/Tokyo'

# nginxの設定ファイルをコピー
COPY ./docker/nginx/*.conf /etc/nginx/conf.d/

# SSL証明書と秘密鍵が入ったディレクトリをコピー
COPY ./docker/nginx/ssl /etc/nginx/ssl

# 作業ディレクトリの指定（Laravelのコードがマウントされる想定）
WORKDIR /var/www/html

# HTTPとHTTPSのポートを公開
EXPOSE 80 443
