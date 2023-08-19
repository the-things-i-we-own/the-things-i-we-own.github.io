'use strict'

let result_txt = "Things I (We) Own"

let categories = {
  'computer' : 'パソコン周辺機器',
  'furniture' : '家具・什器',
  'goods' : '生活・日用品',
  'listening' : '音響機材',
  'printing' : '印刷機・用紙',
  'shopping' : '物販・梱包用品',
  'stationery' : '文房具・工具',
  'viewing' : '映像・撮影機器',
  'www' : 'ウェブ・デジタルコンテンツ',
}

let status = {
  'bought' : '購入物',
  'free' : '頂き物・拾得物',
  'lost' : '廃棄・紛失物',
  'made' : '制作物',
  'members' : '販売品・レンタル',
}

document.addEventListener('readystatechange', event => {
  if (event.target.readyState === 'loading') {
    // 文書の読み込み中に実行する
  } else if (event.target.readyState === 'interactive') {
    // セレクト要素の生成
    select(categories, "categories");
    select(status, "status");
  } else if (event.target.readyState === 'complete') {
  }
});
