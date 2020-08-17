#!/bin/sh


echo "実行するシェルを選択してください"

read name

case "$name" in
    "d") sh d.sh
    ;;
    "ci") sh ci.sh
    ;;
    "git") sh git.sh
    ;;
esac