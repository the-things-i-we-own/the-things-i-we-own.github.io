# The Things I (We) Own
**所有するもの** を *カテゴリー・状態* ごとに 整理して記録する

[index.html](index.html)
* HEAD内にページタイトル・説明文などのメタ情報を記述
* nav id="org" に 所有するものを 絞り込む ラジオボタンを記述

```
<input id="__" value="__" type="radio" name="org">
<label for="__" data-txt="この項目について">項目名</label>
```

* [index.js](js/index.js) HEAD内のメタデータなどからBODYに要素を生成・JSONファイルから要素を生成
* [index.css](css/index.css) 所有するものリストをスタイリングするCSS

***
## 〇〇.json
所有するもののデータを追加するJSONファイル

```
{
  "id" : "___",
  "value" : "___",

  "things" : [
    {
      "org" : "___",
      "name" : "___",
      "type" : "___",
      "description" : "___"
    },
    {
      "org" : "___",
      "name" : "___",
      "type" : "___",
      "description" : "___"
    }
  ]
}
```

[cover.json](json/cover.json)
* ページトップに表示する画像データを追加

```
    {
      "org": "項目の値",
      "size": "サイズの値",
      "x": "横軸(%)",
      "y": "縦軸(%)",
      "src": "画像URL"
    }
    
```
* size
xxx-large | xx-large | x-large | large | medium | small | x-small | xx-small | xxx-small
* x | y
それぞれ 50% が 中央 | x 0% が 左端 : 100% が 右端 | y 0% が 上端 100% が 下端


* [cover.js](css/cover.js) JSONからカバー画像を生成
* [cover.css](css/cover.css) カバー画像をスタイリングするCSS

***

* [org.js](js/org.js) 絞り込みを実装するJavaScript
* [org.css](css/org.css) ページ全体をスタイリングするCSS

***

### [stylesheet.css](stylesheet.css)
色やフォントなどを独自にスタイリングするCSS
