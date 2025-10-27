<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;

$cats = Category::all();
foreach ($cats as $c) {
    $image = $c->image === null ? 'NULL' : $c->image;
    $imageUrl = $c->image_url === null ? 'NULL' : $c->image_url;
    echo "{$c->id} | name={$c->name} | image={$image} | image_url={$imageUrl}\n";
}
