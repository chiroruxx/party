# party
PHPerKaigi2023のフレーム画像を合成するよ。  
forteeがエラーで合成してくれない人も専用Twitterアイコンを設定して一緒に盛り上がろう！！

[PHPerKaigi 2023 専用Twitterアイコンを設定して盛り上がろう！ - PHPerKaigi スタッフブログ](https://blog.phperkaigi.jp/2023/03/21/phperkaigi-2023-twitter-icon/)

# requirements
`ext-gd` が必要です。

# usage
1. 自分のTwitter画像とフレーム画像をダウンロードします。

    フレーム画像は fortee から落とせます。

2. 自分のTwitter画像のパス、フレーム画像のパス、保存する画像のパスを指定してコマンドを実行します。

    ```shell
    php party.php original_image_path frame_image_path result_image_path
    ```
    例：
    ```shell
    php party.php ~/Downloads/058fabf4-b1cd-41c4-a94e-1f6bd6353075.jpg ~/Downloads/twitter-dresser-1.png ~/Downloads/result.png
    ```
3. 自分のTwitterに設定して完了！！
