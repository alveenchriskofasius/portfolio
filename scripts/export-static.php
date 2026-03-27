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
$appUrl = rtrim(config('app.url'), '/');

// Strip full APP_URL from href/src attributes (images, video, build, etc.)
$html = preg_replace('#(href|src)=(["\'])' . preg_quote($appUrl, '#') . '/#', '$1=$2', $html);

// Strip JSON-escaped APP_URL inside data attributes (e.g. data-gallery)
$escapedAppUrl = str_replace('/', '\\/', $appUrl);
$html = str_replace($escapedAppUrl . '\\/', '', $html);

// Fallback: strip any remaining localhost variants (different port, etc.)
$html = preg_replace('#(href|src)=(["\'])https?://localhost(:\d+)?/#', '$1=$2', $html);
$html = preg_replace(
    '#' . preg_quote('https:\\/\\/localhost', '#') . '(:\d+)?\\\/#',
    '',
    $html
);

// Fallback: convert remaining absolute paths to relative
$html = preg_replace('#(href|src)=(["\'])/(build|images|video)/#', '$1=$2$3/', $html);

$outputFile = rtrim($outputDir, '/')  .'/index.html';

if (file_put_contents($outputFile, $html) === false) {
    fwrite(STDERR, "Error: Could not write to $outputFile\n");
    exit(1);
}

echo "Static HTML written to $outputFile (" . strlen($html) . " bytes)\n";
