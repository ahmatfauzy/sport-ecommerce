<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;

foreach (Category::all() as $c) {
    $img = $c->image;
    if (!$img) {
        echo "{$c->id} | {$c->name} | image=NULL\n";
        continue;
    }
    $imgPath = preg_replace('/^public\//', '', $img);
    $full = storage_path('app/public/' . $imgPath);
    echo "{$c->id} | {$c->name} | image={$img} | normalized={$imgPath} | exists=" . (file_exists($full) ? 'YES' : 'NO') . " | full={$full}\n";
}
