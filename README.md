# Rese（リーズ）
**ある企業のグループ会社の飲食店予約サービス**  
  
![image](https://user-images.githubusercontent.com/68457238/229328650-03a339c2-78ca-4a11-af53-a95d666e6ab1.png)
  
  
## 作成した目的  
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。  
（模擬案件を通して実践に近い開発経験をつむ。）
  
## アプリケーションURL  
https://github.com/TH2207/20230402_hirasawa  
  
## 他のリポジトリ  
なし  
  
## 機能一覧
- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報変更
- 飲食店予約情報削除
- 飲食店評価情報追加
- エリアで検索する
- ジャンルで検索する
- 店名で検索する
  
## 使用技術（実行環境）  
- Laravel 8.83.27  
  
## テーブル設計  
![image](https://user-images.githubusercontent.com/68457238/229329154-00287fc1-5b1b-4b25-9553-e4779eeac7d6.png)
![image](https://user-images.githubusercontent.com/68457238/229329177-875bde2c-264a-41c1-98e0-3a7fc9aa80e9.png)
![image](https://user-images.githubusercontent.com/68457238/229329204-68006aad-082e-4968-a435-b21a3e1647c9.png)
  
## ER図  
![image](https://user-images.githubusercontent.com/68457238/229329384-0b48a0b3-e8b4-4bce-ae1e-15a0935cdf95.png)
  
# 環境構築  
**マイグレーションの実行**  
- php artisan migrate  
→上記テーブル設計のテーブルが用意される。  
  
**シーディングの実行**  
- php artisan db:seed  
→初期データが挿入される。（user/region/genre/shop/reserve）  
→テストユーザーは「名前：test/メール：test@test.co.jp/パスワード：password」になります。
  
## 他に記載することがあれば記述する  
- 本Webアプリは基本実装＋追加機能（予約変更機能/評価機能/バリデーション/レスポンシブデザイン）になります。
- 予約人数は最大50人に設定しております。
- 予約日（変更含む）は本日より後の日付のみ設定可能です。
- 店舗評価は一回のみ（既に過ぎた予約項目が該当）となります。
