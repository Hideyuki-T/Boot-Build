#!/bin/bash
# check_communication.sh
# 各コンテナ間の通信確認スクリプト

# --- front_panel_nginx -> cpu_core_app の接続テスト ---
echo "【テスト1】front_panel_nginx から cpu_core_app のポート9000への接続確認"
docker exec front_panel_nginx sh -c "nc -zv cpu_core_app 9000"
if [ $? -eq 0 ]; then
    echo "成功: front_panel_nginx は cpu_core_app のポート9000に接続できます。"
else
    echo "失敗: front_panel_nginx は cpu_core_app のポート9000に接続できません。"
fi
echo "-------------------------------------"

# --- cpu_core_app -> ssd_storage_mysql の接続テスト ---
echo "【テスト2】cpu_core_app から ssd_storage_mysql のポート3306への接続確認"
docker exec cpu_core_app sh -c "nc -zv ssd_storage_mysql 3306"
if [ $? -eq 0 ]; then
    echo "成功: cpu_core_app は ssd_storage_mysql のポート3306に接続できます。"
else
    echo "失敗: cpu_core_app は ssd_storage_mysql のポート3306に接続できません。"
fi
echo "-------------------------------------"

echo "通信テストを完了しました。"
