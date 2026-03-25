<?php

/**
 * Renders the portfolio welcome view to a static index.html file.
 *
 * Usage: php scripts/export-static.php <output-dir>
 */

define('LARAVEL_START', microtime(true));

$outputDir = $argv[1] ?? 'dist';

if (!is_dir($outputDir) && !mkdir($outputDir, 0755, true)) {
    fwrite(STDERR, "Error: Could not create output directory: $outputDir\n");
    exit(1);
}

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $html = view('welcome')->render();
} catch (Throwable $e) {
    fwrite(STDERR, "Error rendering view: {$e->getMessage()}\n");
    exit(1);
}

// Replace absolute and full-URL asset paths with relative paths so the
// static site works regardless of the GitHub Pages sub-path.
$html = preg_replace('#(href|src)=(["\'])https?://[^/]+/build/#', '$1=$2build/', $html);
$html = preg_replace('#(href|src)=(["\'])/build/#', '$1=$2build/', $html);

$outputFile = rtrim($outputDir, '/')  .'/index.html';

if (file_put_contents($outputFile, $html) === false) {
    fwrite(STDERR, "Error: Could not write to $outputFile\n");
    exit(1);
}

echo "Static HTML written to $outputFile (" . strlen($html) . " bytes)\n";
