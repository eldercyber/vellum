<?php
// the following NEW
   class MyDB extends SQLite3 {
      function __construct() {
        $this->open('./db/sms.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
?>