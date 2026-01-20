<?php
require __DIR__.'/vendor/autoload.php';

echo "Testing...\n";

// Проверяем базовый Controller
if (!class_exists('App\Http\Controllers\Controller')) {
    die("Base Controller not found!\n");
}
echo "✓ Base Controller exists\n";

// Проверяем ThingController
if (class_exists('App\Http\Controllers\ThingController')) {
    echo "✓ ThingController exists\n";
    
    // Создаем экземпляр
    try {
        $reflection = new ReflectionClass('App\Http\Controllers\ThingController');
        echo "✓ Can reflect class\n";
        
        // Проверяем наследование
        if ($reflection->isSubclassOf('App\Http\Controllers\Controller')) {
            echo "✓ Properly extends Controller\n";
        } else {
            echo "✗ Does NOT extend Controller!\n";
        }
    } catch (Exception $e) {
        echo "✗ Reflection error: " . $e->getMessage() . "\n";
    }
} else {
    echo "✗ ThingController NOT found\n";
    
    // Посмотрим автозагрузку
    $autoloader = include __DIR__.'/vendor/autoload.php';
    $map = $autoloader->getClassMap();
    
    $key = 'App\Http\Controllers\ThingController';
    if (isset($map[$key])) {
        echo "✓ Found in classmap: " . $map[$key] . "\n";
    } else {
        echo "✗ NOT in classmap\n";
    }
}
