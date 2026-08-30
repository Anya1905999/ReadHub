<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

try {
    /** @var PDO $pdo */
    $pdo = require __DIR__ . '/../config/db.php';

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS schema_migrations (
            migration VARCHAR(255) NOT NULL,
            applied_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (migration)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    $appliedMigrations = array_fill_keys(
        $pdo->query('SELECT migration FROM schema_migrations')->fetchAll(PDO::FETCH_COLUMN),
        true
    );

    $migrationFiles = glob(__DIR__ . '/list/*.sql') ?: [];
    sort($migrationFiles, SORT_STRING);

    $saveMigration = $pdo->prepare(
        'INSERT INTO schema_migrations (migration) VALUES (:migration)'
    );

    foreach ($migrationFiles as $migrationFile) {
        $migrationName = basename($migrationFile);

        if (isset($appliedMigrations[$migrationName])) {
            printf("Пропущена: %s\n", $migrationName);
            continue;
        }

        $sql = trim((string) file_get_contents($migrationFile));

        if ($sql === '') {
            throw new RuntimeException("Миграция пуста: {$migrationName}");
        }

        $pdo->exec($sql);
        $saveMigration->execute(['migration' => $migrationName]);

        printf("Выполнена: %s\n", $migrationName);
    }

    echo "Миграции завершены.\n";
} catch (Throwable $exception) {
    fwrite(STDERR, "Ошибка миграции: {$exception->getMessage()}\n");
    exit(1);
}
