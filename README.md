# 網頁設計(17300)乙級術科檢定練習 3
最後一次練習只練三四題，一二題可以在時間內完成，剩下時間就是打熟共用檔案，把題目讀熟。

第一題：老師說他的解法如果題目和解法背到很熟，打字也練到很快，考試的時候不犯錯一次打完，可以在時間內(4小時)做完。我的解法可以讓我不刻意背題目和解法細節，考試一邊除錯，還是可以3小時內做完。

第二題：功能不多，也不複雜，也都不相似，所以基本上時間都差不多。

第三題：遇到問題沒有卡太久，可以在4小時內，實際約3.5小時，把所有功能全部做完，功能上不偷工減料。

第四題：練習對題目沒有很熟悉，比第三題花更多時間看題目，還是可以剛好在4小時內，把所有功能全部做完，功能上不偷工減料。

## 共用檔案
1. base.php - 函式類，包含Session、SQL操作、和其他較常使用的功能
    - session_start();
    - SQL (pdo,queryAll,find,find1,save,del,rowcount,max,sum)
    - 網頁重導
    - api內的redirect功能(使用多次又容易打錯)
    - 分頁 ( < 1 2 3 >)
    - 檔案上傳 (包含路徑存回$_POST)
    - 第三題變數(分級、場次、動畫效果)
    - 第四題變數(今天日期、兩個驗證碼、後台選單[do=>text])

2. api.php - 前端表單會將POST內容設計成讓API可以直接存進資料庫，減少API數量
    - 單筆新增或修改(save)
    - 多筆刪除或修改(edit)
    - 單筆刪除(del)
    - 新增訂單(order：三四題下訂，serialize座位或購物清單，訂單編號，第四題需要unset購物車session)
    - 第三題api(ses：場次下拉式選單、seat：場次已訂座位)
    - 第四題api(login：登入，需要紀錄admin+mem登入資訊、delc：刪除購物車)

3. c.css - 主要以三、四題會用到的樣式為主
    - .w100, .w80, .w49, .ma, .uli, .uli .tabs, tc, .dn, .dib
    - 第三題座位css： .bk, .em
    - 第四題購物css： input[readonly]

4. j.js - 主要以三、四題常會用到的功能為主，有AJAX所以需要放在body最後面
    - AJAX： 按button刪除、修改名稱(prompt)、刪除購物車、上下架，id和table統一放在上一層
    - function gt： 有的版型沒有，有時間就打

5. 有時間就先用測試表格複製好三四題表格
    - 測試用表格欄位： id,name,file,sh,ord
    - 三： poster, mv, ord
    - 四： admin, mem, th, cat, bot, ord

6. 軟體設定
    - 裝vscode > 裝xampp(裝比較久) > 安裝vscode plugin和其他設定
    - 刪除不需要的中文輸入法
    - httpd.conf: document root改成 D:\webXX
    - php.ini 時區*2改成 Asia/Taipei

## 考試(90min+4hr)筆記
### 準備共用檔案(90min)
    - base變數名稱不要少於3個英文字，避免正式考試時衝到
    - 正式做考題時，全域或最上層變數至少2個英文字，迴圈內會全部用1個英文字
    - base.save記得檢查$col空值
    - api?do=edit的多筆修改記得加$col['id']=$key
    - api?do=save的功能設計與base.save一樣共用insert和update，POST記得加id
    - api?do=save檔案都放進img資料夾，可以多增加第三題院線片的poster,trailer
    - 資料庫欄位可加預設值，或直接在表單塞input:hidden

### 第一題(4hr)
    - 所有資料庫欄位名稱一樣，name放會直接顯示的文字，file放其他資料(檔案、密碼、連結)
    - 後台功能以資料夾分類命名，下面再分home,new,edit，複製後就只需要改資料夾名稱
    - 整個目錄複製後修改時，到最新消息(含)之前，都只註解掉不需要的程式碼
    - 後台圖片和動畫標籤都用embed，embed都支援，減少修改
    - 後台多項顯示採用input:hidden#id[sh][value=0]+input:checkbox#id[sh][value=1]，checkbox沒有被勾選不會有值，被勾選1會蓋掉0
    - 前台選單的js在js.js，其他都在寫在行內
    - 前台校園映像控制判斷有bug

### 第二題(4hr)
    - 共用api.php用不太到，加上個功能都不太一樣，所以直接寫會比較快
    - 按讚部分要熟悉素材提供的js
    - 問卷前台部分CP值最低，可以最後做

### 第三題(4hr)
    - 預告片前台須複習，動畫都一樣。
    - 預告片輪播控制按鈕採用類似第一題的解法，左右鍵用&ltrif;(left triangle full)和&rtrif;(right triangle full);
    - 訂票前台須複習，尤其場次部分，還有js(Array.includes(),Array.push(),Array.join())
    - 訂票結果直接用js產生，可以少打id和選擇元素的部分
    - 院線片海報和預告片直接放進img資料夾
    - 順序： 預告片後台前台 > 院線片後台前台 > 訂票前台後台

### 第四題(4hr)
    - 增加input[readonly] css，訂單前後台表格內全部用input，下單時可以直接submit，api只需要對購物清單做serialize，後台也可以複製前台來改
    - 購物車使用SESSION，不用AJAX
    - 刪除購物車項目時，記得清除url內的id
    - 記得複製bot.png
    - 順序(簡單的看到就做，當休息)： 會員前台後台 > 管理者後台 > 商品後台前台 > 購物前台後台