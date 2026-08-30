<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Smarty\Smarty;

$action = $_GET['action'] ?? 'get';

switch ($action) {
    case 'get':
        try {
            /** @var PDO $pdo */
            $pdo = require __DIR__ . '/../../config/db.php';

            $categories = $pdo->query(
                'SELECT id, name, description
                 FROM categories
                 ORDER BY name'
            )->fetchAll();

            $articles = $pdo->query(
                'SELECT
                    a.ID AS id,
                    a.name,
                    a.description,
                    a.image_url,
                    a.dt_create,
                    a.category_id,
                    c.name AS category_name
                 FROM articles AS a
                 INNER JOIN categories AS c ON c.id = a.category_id
                 ORDER BY a.dt_create DESC, a.ID DESC
                 LIMIT 6'
            )->fetchAll();

            $smarty = new Smarty();
            $smarty->setTemplateDir(__DIR__ . '/../pages/');
            $smarty->setCompileDir(sys_get_temp_dir());
            $smarty->assign('categories', $categories);
            $smarty->assign('articles', $articles);
            $smarty->display('home.tpl');
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            http_response_code(500);
            exit('Ошибка загрузки главной страницы');
        }
        break;

    default:
        http_response_code(400);
        exit('Неизвестное действие');
}
