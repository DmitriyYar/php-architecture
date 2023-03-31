<?php
readfile('index.html');

date_default_timezone_set('Europe/Moscow');

// Создаем новый объект DirectoryIterator
$dir = new DirectoryIterator('mydir'); // dirname(__FILE__)

// Цикл по содержанию директории
echo "<span class='column-1 title'>". 'Каталог ' . $dir->getPath() ."</span>" . "<br>";
foreach ($dir as $item) {
    if ($item == "." || $item == "..") continue;
    echo "<span class='column-1'>" . $item . "</span>";
    echo "<span class='column-2'>" . date('d.m.Y H:i', $item->getMTime()) . "</span>";
    echo "<span class='column-3'>" . $item->getSize() . " Байт" . "</span>";
    echo "<span class='column-3'>" . ($item->isDir() ? "каталог" : "файл") . "</span>";
    echo "<br>";
}


// Рекурсивный вывод каталога mydir
echo "<br>";
echo "<span class='column-1 title'>". 'Рекурсивный вывод каталога mydir' ."</span>" . "<br>";

$iter = new RecursiveDirectoryIterator('mydir', FilesystemIterator::SKIP_DOTS); //  FilesystemIterator::SKIP_DOTS

$pathCurrent = $iter->getPath();
foreach (new RecursiveIteratorIterator($iter) as $item) {
    if ($item->getPath() !== $pathCurrent) {

        echo "<span style='width: 300px; display: inline-block'>" . $item->getPath() . "</span>" . "<br>";
    }
    echo "<span class='column-1' style='padding-left: 40px'>" .$item->getFilename() . "</span>";
//    echo "<span style='width: 300px; display: inline-block'>" . $item . "</span>";
    echo "<span class='column-2'>" . date('d.m.Y H:i', $item->getMTime()) . "</span>";
    echo "<span class='column-3'>" . $item->getSize() . " Байт" . "</span>";
    echo "<span class='column-3'>" . ($item->isDir() ? "каталог" : "файл") . "</span>";
    echo "<br>";
    $pathCurrent = $item->getPath();
}

// Вывод директорий в которых файлы с расширением .doc и .xlsx
echo "<br>";
echo "<span class='column-1 title'>". 'Вывод директорий с файлами .doc и .xlsx' ."</span>" . "<br>";

$iter = new RecursiveDirectoryIterator('mydir', FilesystemIterator::SKIP_DOTS); // без вывода скрытых папок

foreach (new RegexIterator(new RecursiveIteratorIterator($iter), '/.(doc|xlsx)$/') as $item) {
    echo "<span class='column-1'>" . $item . "</span>";
    echo "<span class='column-2'>" . date('d.m.Y H:i', $item->getMTime()) . "</span>";
    echo "<span class='column-3'>" . $item->getSize() . " Байт" . "</span>";
    echo "<span class='column-3'>" . ($item->isDir() ? "каталог" : "файл") . "</span>";
    echo "<br>";
}
?>