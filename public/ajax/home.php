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
                'SELECT
                    c.id,
                    c.name,
                    c.description,
                    COUNT(ac.article_id) AS article_count
                 FROM categories AS c
                 INNER JOIN article_categories AS ac ON ac.category_id = c.id
                 GROUP BY c.id, c.name, c.description
                 ORDER BY c.name'
            )->fetchAll();

            $articlesStatement = $pdo->prepare(
                'SELECT
                    a.ID AS id,
                    a.name,
                    a.description,
                    a.image_url,
                    a.dt_create,
                    COALESCE(article_view_totals.views_count, 0) AS views_count
                 FROM article_categories AS ac
                 INNER JOIN articles AS a ON a.ID = ac.article_id
                 LEFT JOIN (
                    SELECT article_id, COUNT(*) AS views_count
                    FROM article_views
                    GROUP BY article_id
                 ) AS article_view_totals ON article_view_totals.article_id = a.ID
                 WHERE ac.category_id = :category_id
                 ORDER BY a.dt_create DESC, a.ID DESC
                 LIMIT 3'
            );

            foreach ($categories as &$category) {
                $articlesStatement->execute(['category_id' => $category['id']]);
                $category['articles'] = $articlesStatement->fetchAll();
            }
            unset($category);

            $smarty = new Smarty();
            $smarty->setTemplateDir(__DIR__ . '/../pages/');
            $smarty->setCompileDir(sys_get_temp_dir());
            $smarty->assign('categories', $categories);
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
