# 公開レポジトリからベースイメージをインポート（Laravel10はphp8.2以上が必須）
FROM php:8.2-fpm

# COPY php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Composer install（マルチステージビルド）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# install Node.js（マルチステージビルド）
COPY --from=node:20.16 /usr/local/bin /usr/local/bin
COPY --from=node:20.16 /usr/local/lib /usr/local/lib

# パッケージ管理ツール（apt-get）の更新＆必要パッケージのインストール
RUN apt-get update \
    && apt-get -y install \
    git \
    zip \
    unzip \
    vim \
    && docker-php-ext-install pdo_mysql bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# ビルド時の引数としてGitHubユーザー名とメールアドレスを受け取る
ARG GIT_USER
ARG GIT_EMAIL

RUN git config --global user.name "${GIT_USER}" \
    && git config --global user.email "${GIT_EMAIL}" \
    && git config --global --add safe.directory /var/www/html

# コンテナに入ったときの作業ディレクトリを指定
WORKDIR /var/www/html
