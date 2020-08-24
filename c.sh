#!/bin/sh


echo "実行するシェルを選択してください\nc : ciの構文エラーチェック\nd : コンテナに入る\ne : EC2インスタンスに接続\ng : gitの変更をコミット、プッシュ"

read name

case "$name" in
    "c") sh ./scripts/ci_validate.sh
    ;;
    "d") sh ./scripts/docker.sh
    ;;
    "e") sh ./scripts/ec2.sh
    ;;
    "g") sh ./scripts/git.sh
    ;;
esac



