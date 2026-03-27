<?php

$categoryFiles = glob(__DIR__ . '/menu_seeder/*_seeder.php') ?: [];

// Atur urutan file seeder secara manual sesuai kebutuhan.
$seederFileOrder = [
    'identitaspengguna_seeder.php',
    'masterdata_seeder.php',
    'perangkatsekolah_seeder.php',
];
$seederFilePriority = array_flip($seederFileOrder);

usort($categoryFiles, static function (string $a, string $b) use ($seederFilePriority): int {
    $aName = basename($a);
    $bName = basename($b);
    $aPriority = $seederFilePriority[$aName] ?? PHP_INT_MAX;
    $bPriority = $seederFilePriority[$bName] ?? PHP_INT_MAX;

    if ($aPriority !== $bPriority) {
        return $aPriority <=> $bPriority;
    }

    return strcmp($aName, $bName);
});

$categories = [];

foreach ($categoryFiles as $categoryFile) {
    if (str_starts_with(basename($categoryFile), '_')) {
        continue;
    }

    $loaded = require $categoryFile;
    if (!is_array($loaded)) {
        continue;
    }

    foreach ($loaded as $categoryKey => $categoryConfig) {
        $categories[$categoryKey] = $categoryConfig;
    }
}

return [
    'categories' => $categories,
];
