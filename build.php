<?php
/**
 * Cross-platform PHP Static Site Builder for Netlify
 * --------------------------------------------------
 * Compiles `index.php` into `dist/index.html` and copies `assets/`
 * into `dist/assets/` so Netlify serves a zero-latency static bundle.
 *
 * Usage: php build.php
 */

declare(strict_types=1);

$rootDir = __DIR__;
$distDir = $rootDir . DIRECTORY_SEPARATOR . 'dist';

function removeDirRecursive(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($items as $item) {
        if ($item->isDir()) {
            rmdir($item->getRealPath());
        } else {
            unlink($item->getRealPath());
        }
    }
    rmdir($dir);
}

function copyDirRecursive(string $src, string $dst): void
{
    if (!is_dir($src)) {
        return;
    }
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($src, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($items as $item) {
        $relative = substr($item->getPathname(), strlen($src) + 1);
        $target = $dst . DIRECTORY_SEPARATOR . $relative;
        if ($item->isDir()) {
            if (!is_dir($target)) {
                mkdir($target, 0755, true);
            }
        } else {
            copy($item->getPathname(), $target);
        }
    }
}

echo "Building Yanru & Louvelle wedding invitation...\n";

removeDirRecursive($distDir);
mkdir($distDir, 0755, true);

// Render index.php via output buffering so no shell escaping issues occur
ob_start();
include $rootDir . DIRECTORY_SEPARATOR . 'index.php';
$html = ob_get_clean();

if ($html === false || trim($html) === '') {
    fwrite(STDERR, "Error: index.php produced empty output.\n");
    exit(1);
}

$outHtml = $distDir . DIRECTORY_SEPARATOR . 'index.html';
file_put_contents($outHtml, $html);
echo "Compiled index.php -> dist/index.html (" . number_format(strlen($html)) . " bytes)\n";

$assetsSrc = $rootDir . DIRECTORY_SEPARATOR . 'assets';
$assetsDst = $distDir . DIRECTORY_SEPARATOR . 'assets';
if (is_dir($assetsSrc)) {
    copyDirRecursive($assetsSrc, $assetsDst);
    echo "Copied assets/ -> dist/assets/\n";
}

echo "Build complete. Ready to publish `dist/` on Netlify.\n";
