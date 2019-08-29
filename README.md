# 網頁設計(17300)乙級術科檢定練習 3
最後一次練習只練三四題，一二題可以在時間內完成。

第一題：老師說他的解法如果題目和解法背到很熟，打字也練到很快，考試的時候不犯錯一次打完，可以在時間內(4小時)做完。我的解法可以讓我不刻意背題目和解法細節，考試一邊除錯，還是可以3小時內做完。

第二題：功能不多，也不複雜，也都不相似，所以基本上時間都差不多。

## 準備共用檔案
1. base.php - 函式類，包含Session、SQL操作、和其他較常使用的功能
    - session_start();
    - SQL (pdo,queryAll,find,save,del) 其他延伸functions
    - 網頁重導
    - 分頁 ( < 1 2 3 >)
    - 檔案上傳 (包含路徑存回$_POST)
    - 第三題變數(分級、場次)

2. api.php - 前端表單會將POST內容設計成讓API可以直接存進資料庫，減少API數量
    - 單筆新增或修改
    - 多筆刪除或修改
    - 單筆刪除
    - 新增訂單(三四題下訂，serialize座位或購物清單，第四題需要unset購物車session)
    - 有時間先打三(場次下拉式選單、場次已訂座位)、四(登入、刪除購物車)題api

3. c.css - 主要以三、四題會用到的樣式為主
    - .w-100, .w-80, .ma, .ul-i, .ul-i .tabs, tc, input[readonly]

4. j.js - 主要以三、四題常會用到的功能為主，有AJAX所以需要放在body最後面
    - AJAX 主要是按button刪除和修改名稱(prompt)，id和table統一放在上一層
    - function gt: 有的版型沒有，有時間就打

## 筆記
### 共用
    - base.save記得檢查$col空值
    - api?do=edit的多筆修改記得加$col['id']=$key
    - api?do=save的功能設計與base.save一樣共用insert和update，POST記得加id
    - api?do=save檔案都放進img資料夾(第三題?)
    - 資料庫欄位可加預設值，或直接在表單塞input:hidden

### 第一題
    - 所有資料庫欄位名稱一樣，name放會直接顯示的文字，file放其他資料(檔案、密碼、連結)
    - 後台功能以資料夾分類命名，下面再分home,new,edit，複製後就只需要改資料夾名稱
    - 整個目錄複製後修改時，到最新消息(含)之前，都註解掉不需要的程式碼
    - 後台圖片和動畫標籤都用embed，embed都支援，減少修改
    - 後台多項顯示採用input:hidden#id[sh][value=0]+input:checkbox#id[sh][value=1]，checkbox沒有被勾選不會有值，被勾選1會蓋掉0
    - 前台選單的js在js.js，其他都在寫在行內
    - 前台校園映像控制判斷有bug

### 第二題
    - 共用api.php用不太到，加上個功能都不太一樣，所以直接寫會比較快
    - 按讚部分要熟悉素材提供的js
    - 問卷前台部分CP值最低，可以最後做

### 第三題
    - 預告片前台須複習，動畫都一樣。
    - 預告片輪播控制按鈕採用類似第一題的解法，左右鍵用&ltrif;(left triangle full)和&rtrif(right triangle full);
    - 訂票前台須複習，尤其場次部分，還有js(Array.includes(),Array.push(),Array.join())
    - 訂票結果直接用js產生，可以少打id和放值得部分

### 第四題
    - 增加input[readonly] css，訂單前後台欄位全部用input，下單時可以直接submit，api只需要對購物清單做serialize
    - 訂單購物車使用SESSION，不用AJAX