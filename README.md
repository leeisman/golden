
## Backend

### 一.command 請使用
```
php artisan lottery:update_winning_number 2  20190902001
php artisan lottery:update_winning_number 1  20190902001
```
### 二. 上面程式或規格可能存在什麼潛在問題？還可以怎樣優化？
#####1.放入陣列資料對應容易發生錯誤
```
  $this->lottery->update([
                'winning_number' => $target->getWinningNumber();
            ]);
```
### 三.如果要加入第三家號源，會怎麼進行擴充
已經設計出來了，透過簡單工廠模式，只要增加config檔案lotteryChannel,在實作新的信號繼層LotteryChannel即可。
### 四.每個號源有不同的速率限制，會如何實現限流，防止被 ban
已經設計坊賭機制，再透過排程設定即可。
### 五.開獎時間並非準時，您會如何實現重試機制？
排程會持續檢查是否取得資料，沒有就在重試。
### 六.可以實現哪些手段來減少程式運行時間？
單一排程，只取得其中一個信號資料，再透過主訊息排程來生出最終號碼。
