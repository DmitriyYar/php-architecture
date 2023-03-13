<?php
// db.php настраиваем на извлечение в виде ассоциативного массива
return new PDO('sqlite:database.db', null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);