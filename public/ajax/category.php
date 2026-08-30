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

            $sortOptions = [
                'date_desc' => 'a.dt_create DESC, a.ID DESC',
                'date_asc' => 'a.dt_create ASC, a.ID ASC',
                'views_desc' => 'views_count DESC, a.dt_create DESC, a.ID DESC',
            ];
            $sort = (string) ($_GET['sort'] ?? 'date_desc');

            if (! array_key_exists($sort, $sortOptions)) {
                $sort = 'date_desc';
            }

            $page = filter_var($_GET['page'] ?? 1, FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1],
            ]);

            if ($page === false) {
                http_response_code(422);
                exit('Некорректный номер страницы');
            }

            $articlesPerPage = 9;

            $countStatement = $pdo->prepare(
                'SELECT COUNT(*)
                 FROM article_categories
                 WHERE category_id = :category_id'
            );
            $countStatement->execute(['category_id' => $category['id']]);
            $totalArticles = (int) $countStatement->fetchColumn();
            $totalPages = max(1, (int) ceil($totalArticles / $articlesPerPage));
            $currentPage = min($page, $totalPages);
            $offset = ($currentPage - 1) * $articlesPerPage;

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
                 ORDER BY ' . $sortOptions[$sort] . '
                 LIMIT :limit OFFSET :offset'
            );
            $articlesStatement->bindValue(':category_id', (int) $category['id'], PDO::PARAM_INT);
            $articlesStatement->bindValue(':limit', $articlesPerPage, PDO::PARAM_INT);
            $articlesStatement->bindValue(':offset', $offset, PDO::PARAM_INT);
            $articlesStatement->execute();

            $smarty = new Smarty();
            $smarty->setTemplateDir(__DIR__ . '/../pages/');
            $smarty->setCompileDir(sys_get_temp_dir());
            $smarty->assign('category', $category);
            $smarty->assign('articles', $articlesStatement->fetchAll());
            $smarty->assign('sort', $sort);
            $smarty->assign('totalArticles', $totalArticles);
            $smarty->assign('currentPage', $currentPage);
            $smarty->assign('totalPages', $totalPages);
            $smarty->assign('previousPage', max(1, $currentPage - 1));
            $smarty->assign('nextPage', min($totalPages, $currentPage + 1));
            $smarty->assign(
                'paginationPages',
                $totalPages > 1 ? range(1, $totalPages) : []
            );
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
