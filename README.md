# The Things I (We) Own
**所有するもの** を *カテゴリー・状態* ごとに 整理して記録する

* [index.json](index.json)
ページタイトル・説明文 などのメタ情報を記述

```
"title" : "The Things I (We) Own",
"description" : "このページに、私（わたしたち）が所有するもの を 用途・入手経路 ごとに 整理して記録します。",
"author" : "creative-community.space",
"email" : "pehu@creative-community.space",
"type" : "website",
"twitter" : "@pe_hu_",
"card" : "summary",
"src" : "icon.png",
"icon" : "icon.png",
```

* [index.js](template/index.js)
JSONファイルから要素を生成するJavaScript
* [style.css](template/style.css)
ページをスタイリングするCSS

---
## org
絞り込み項目をJSONに記述

| id | name | info |
|:-----------|:---------|:----|
| bought | 購入物 | 購入したもの、外注して制作したもの、など |
| gift | 頂き物 | 関わった人たちから頂いたもの、など |
| free | 拾得物 | 拾ったもの、無料で配布されていたもの、など |
| made | 制作物 | 作ったもの、出来たもの、など |
| other | その他 | 資料や書類など、上記のカテゴリーに当てはまらないもの |

* [org.js](template/org.js)
絞り込みを実装するJavaScript

---
## cover
絞り込み項目をJSONに記述
```
{
  "org" : "絞り込みID",
  "size" : "画像サイズ",
  "x" : "横軸(%)",
  "y" : "縦軸(%)",
  "src" : "画像URL"
}
```
* [cover.css](template/cover.css)
カバー画像をスタイリングするCSS
* size
xxx-large | xx-large | x-large | large | medium | small | x-small | xx-small | xxx-small
* x | y
それぞれ 50% が 中央 | x 0% が 左端 : 100% が 右端 | y 0% が 上端 100% が 下端


***
### 〇〇.json

```
{
  "id" : "___",
  "value" : "___",

  "things" : [
    {
      "org" : "___",
      "name" : "___",
      "type" : "___",
      "description" : "___",
      "url" : "___"
    },
    {
      "org" : "___",
      "name" : "___",
      "type" : "___",
      "description" : "___",
      "url" : "___"
    }
  ]
}
```

* [things.js](template/things.js)
JSONファイルからリストを生成するJavaScript

***
## [the-things-i-we-own.github.io](https://the-things-i-we-own.github.io/)
