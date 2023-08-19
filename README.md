# The Things I (We) Own
**所有するもの** を *カテゴリー・状態* ごとに 整理して記録する

## [index.json](index.json)
ページタイトル・説明文などのメタ情報を記述

## [index.php](index.php)
* details id="filter" 内に、絞り込みに使用するセレクター要素を必要なだけ記述
* それぞれのセレクター要素 に name属性を設定
* セレクター要素内に value="all" を設定した オプション要素を記述

## [log.php](log.php)
* 所有するものを記録する CSVファイル を設定
* li 要素に セレクター要素 の値を取得する カスタムデータ属性を設定

***

JavaScript
[index.js](../js/index.js)
[select.js](../js/select.js)
[filter.js](../js/filter.js)
---
## [script.js](script.js)
セレクター要素内に生成する オプション要素 を設定する

* セレクター要素 の name属性値 と同じ 変数 に 値と表示するテキストを オブジェクト形式 で 記述
* DOMContentLoaded イベント に select(変数名, "変数名") を設定

### 例
| Categories | カテゴリー | |
|:-----|:-------|:----|
| computer | Computer Device | パソコン周辺機器 |
| furniture | Furniture | 家具・什器 |
| goods | Home Goods | 生活・日用品 |
| listening | Sound Equipment | 音響機材 |
| printing | Print Equipment | 印刷機・用紙 |
| shopping | Register & Shipping Supplies | 物販・梱包用品 |
| stationery | Stationery & Tools | 文房具・工具 |
| viewing | Video Equipment | 映像・撮影機器 |
| www | Web & Digital Contents | ウェブサービス・デジタルコンテンツ |

| Statuses | 状態 | |
|:-----------|:---------|:----|
| bought | 購入物 | 購入したもの、など |
| free | 頂き物・拾得物 | 頂いたもの、拾ったもの、など |
| lost | 廃棄・紛失物 | 廃棄・紛失物 |
| made | 制作物 | 作ったもの、出来たもの、など |
| members | 販売品・レンタル | 不用なもの、有料貸出品（会員限定）、など |

* let result_txt に 絞り込み後に ヒット数 と合わせて表示するテキストを設定


***

Stylesheet
[index.css](../css/index.css)
[filter.css](../css/filter.css)
[log.css](../css/log.css)
---
## [style.css](style.css)
ページを独自にスタイリングする

***
## [URL](https://creative-community.space/org/own/)
