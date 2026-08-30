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
            $rawCategoryId = $_GET['id'] ?? null;

            if ($rawCategoryId === null) {
                $category = $pdo->query(
                    'SELECT id, name, description
                     FROM categories
                     ORDER BY id
                     LIMIT 1'
                )->fetch();
            } else {
                $categoryId = filter_var($rawCategoryId, FILTER_VALIDATE_INT, [
                    'options' => ['min_range' => 1],
                ]);

                if ($categoryId === false) {
                    http_response_code(422);
                    exit('Некорректный идентификатор категории');
                }

                $categoryStatement = $pdo->prepare(
                    'SELECT id, name, description
                     FROM categories
                     WHERE id = :id'
                );
                $categoryStatement->execute(['id' => $categoryId]);
                $category = $categoryStatement->fetch();
            }

            if ($category === false) {
                http_response_code(404);
                exit('Категория не найдена');
            }

            $articlesStatement = $pdo->prepare(
                'SELECT ID AS id, name, description, image_url, dt_create, category_id
                 FROM articles
                 WHERE category_id = :category_id
                 ORDER BY dt_create DESC, ID DESC'
            );
            $articlesStatement->execute(['category_id' => $category['id']]);

            $smarty = new Smarty();
            $smarty->setTemplateDir(__DIR__ . '/../pages/');
            $smarty->setCompileDir(sys_get_temp_dir());
            $smarty->assign('category', $category);
            $smarty->assign('articles', $articlesStatement->fetchAll());
            $smarty->display('category.tpl');
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            http_response_code(500);
            exit('Ошибка загрузки категории');
        }
        break;

    default:
        http_response_code(400);
        exit('Неизвестное действие');
}
