# 網頁設計(17300)乙級術科檢定練習 2

## 準備共用檔案
1. base.php - 函式類，包含Session、SQL操作、和其他較常使用的功能
    - session_start();
    - SQL (pdo,queryAll,find,save,del) 其他延伸functions
    - 網頁重導
    - 分頁
    - 檔案上傳

2. api.php - 前端表單會將POST內容設計成讓API可以直接存進資料庫，減少API數量
    - 單筆新增或修改
    - 多筆刪除或修改
    - 單筆刪除
