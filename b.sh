#!/bin/sh


echo "実行するシェルを選択してください\nc : ciの構文エラーチェック\nd : コンテナに入る\ng : gitの変更をコミット、プッシュ"

read name

case "$name" in
    "d") sh ./scripts/docker.sh
    ;;
    "c") sh ./scripts/ci_validate.sh
    ;;
    "g") sh ./scripts/git.sh
    ;;
esac