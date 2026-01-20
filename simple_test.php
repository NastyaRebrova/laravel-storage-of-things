<?php
echo "=== Simple Test ===\n";

// 1. Загружаем автозагрузку
require __DIR__.'/vendor/autoload.php';
echo "✓ Autoload loaded\n";

// 2. Проверяем класс
if (class_exists('App\Http\Controllers\ThingController')) {
    echo "✓ ThingController class FOUND\n";
    exit(0);
} else {
    echo "✗ ThingController class NOT FOUND\n";
    
    // Проверим что может быть не так
    $file = __DIR__.'/app/Http/Controllers/ThingController.php';
    $content = file_get_contents($file);
    
    // Проверим BOM (невидимые символы в начале файла)
    if (substr($content, 0, 3) === "\xEF\xBB\xBF") {
        echo "✗ File has BOM (Byte Order Mark) - это проблема!\n";
    } else {
        echo "✓ No BOM in file\n";
    }
    
    // Проверим закрывающий тег PHP
    if (strpos($content, '?>') !== false) {
        echo "✗ File has closing PHP tag - не рекомендуется в Laravel\n";
    }
    
    exit(1);
}
