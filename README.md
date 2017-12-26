### Panda Log Usage

> panda log is a debugger tool for flushing program runtime data to binary log file.
It is lightweight,easy-to-use and interface user-friendly.Just enjoy it.
 
```php
 // log string
 $str = "test for string";
 Panda::instance()->log2("str",$str);
 // log sql
 $sql = (new Query())->select("some_table")->where(["id"=>4032]);
 Panda::instance()->log2("sql",$sql);
 // log number
 $num = 323;
 Panda::instance()->log2("num",$num);
 
 //flush all above records to log file please call following code
 Panda::instance()->flush();
```

### Support or Contact

Having trouble with panda log? contact me with QQ 981326632
