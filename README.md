# [ORG](https://github.com/the-things-i-we-own)

## URL : https://creative-community.space/org/template/


Code
[the-things-i-we-own.github.io](https://github.com/the-things-i-we-own/the-things-i-we-own.github.io)

Discussions
[the-things-i-we-own/teams/org](https://github.com/orgs/the-things-i-we-own/teams/org)

___


## about.php
ウェブページの説明文／絞り込みカテゴリーについてを記述するPHPファイル
※93行以降に説明文を編集する

## about.csv
絞り込みカテゴリーについてを記述するCSVファイル
（書き方 : 絞り込み項目,カテゴリー名,"カテゴリーの説明",）


## img.csv
カバービジュアル／写真付きリストに表示する内容を記述するCSVファイル
（書き方 : 絞り込み項目,画像サイズ,"題目","説明文",）

※絞り込み項目は、about.csvにまとめる | 画像サイズは、cover.cssを確認

※カバービジュアルには25行目までが表示される（1行目から順に画像は上に重なって表示される）

※写真付きリストには、img.csvに記述したすべての写真が表示される


## img.php
所有するものを画像付きで掲載するリストページのPHPファイル
## cover.css
カバービジュアルをスタイリングするCSSファイル


## test/index.php 
所有するものリスト用CSVファイルを出力するPHPファイル（必要なリスト用のファイルを複製）
## __/list.csv
所有するものリスト用CSVファイル


## index.css
ホームページをスタイリングするCSS
## index.js
操作音を設定するジャバスクリプトファイル

___


# index.php

> header > title | meta (description, url) 
> 
> body > id="marquee" (流れる文字) | id="nav" (h1 : ページタイトル) 
> 
> 絞り込みカテゴリー | body > ol class="search-box" | CSS > カテゴリー名:checked~label
> 
> リストの埋め込み | body > class="mousedragscrollable" | script > $("#__").load("__/index.php");
> 


## *CSS Text & Color*

色を指定
> ページ背景・文字などの色を指定 | index.php内の header > style :root のカラーネームを編集
> 
> カラーネームは、[https://htmlcolorcodes.com/color-names/](https://htmlcolorcodes.com/color-names/) を参照


フォントの指定
> --text-family：ページタイトル・サブタイトルなどの文字フォントを指定
> 
> --list-family：流れる文字・絞り込み・リストなどの文字フォントを指定
> 
> ※ フォントの記述方法は、[https://www.cssfontstack.com/](https://www.cssfontstack.com/) を参照

___

参考ツール

[https://picular.co/](https://picular.co/)

[https://pigment.shapefactory.co/](https://pigment.shapefactory.co/)

[https://colorable.jxnblk.com/](https://colorable.jxnblk.com/)
