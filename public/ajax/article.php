<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Smarty\Smarty;

$action = $_GET['action'] ?? 'get';

switch ($action) {
    case 'get':
        $articleId = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);

        if ($articleId === false || $articleId === null) {
            http_response_code(422);
            exit('Некорректный идентификатор статьи');
        }

        try {
            /** @var PDO $pdo */
            $pdo = require __DIR__ . '/../../config/db.php';

            $statement = $pdo->prepare(
                'SELECT
                    a.ID AS id,
                    a.name,
                    a.description,
                    a.content,
                    a.image_url,
                    a.dt_create,
                    COALESCE(article_view_totals.views_count, 0) AS views_count
                 FROM articles AS a
                 LEFT JOIN (
                    SELECT article_id, COUNT(*) AS views_count
                    FROM article_views
                    GROUP BY article_id
                 ) AS article_view_totals ON article_view_totals.article_id = a.ID
                 WHERE a.ID = :id'
            );

            $statement->execute(['id' => $articleId]);
            $article = $statement->fetch(PDO::FETCH_ASSOC);

            if (! $article) {
                http_response_code(404);
                exit('Статья не найдена');
            }

            $categoriesStatement = $pdo->prepare(
                'SELECT c.id, c.name, c.description
                 FROM article_categories AS ac
                 INNER JOIN categories AS c ON c.id = ac.category_id
                 WHERE ac.article_id = :article_id
                 ORDER BY c.name'
            );
            $categoriesStatement->execute(['article_id' => $articleId]);
            $article['categories'] = $categoriesStatement->fetchAll();
            $article['primary_category'] = $article['categories'][0] ?? null;

            $saveViewStatement = $pdo->prepare(
                'INSERT INTO article_views (article_id) VALUES (:article_id)'
            );
            $saveViewStatement->execute(['article_id' => $articleId]);
            $article['views_count'] = (int) $article['views_count'] + 1;

            $relatedStatement = $pdo->prepare(
                'SELECT
                    a.ID AS id,
                    a.name,
                    a.dt_create,
                    COALESCE(article_view_totals.views_count, 0) AS views_count
                 FROM articles AS a
                 LEFT JOIN (
                    SELECT article_id, COUNT(*) AS views_count
                    FROM article_views
                    GROUP BY article_id
                 ) AS article_view_totals ON article_view_totals.article_id = a.ID
                 WHERE a.ID <> :excluded_article_id
                   AND EXISTS (
                       SELECT 1
                       FROM article_categories AS candidate_categories
                       INNER JOIN article_categories AS source_categories
                           ON source_categories.category_id = candidate_categories.category_id
                       WHERE candidate_categories.article_id = a.ID
                         AND source_categories.article_id = :source_article_id
                   )
                 ORDER BY RAND()
                 LIMIT 3'
            );
            $relatedStatement->bindValue(':excluded_article_id', $articleId, PDO::PARAM_INT);
            $relatedStatement->bindValue(':source_article_id', $articleId, PDO::PARAM_INT);
            $relatedStatement->execute();

            $smarty = new Smarty();
            $smarty->setTemplateDir(__DIR__ . '/../pages/');
            $smarty->setCompileDir(sys_get_temp_dir());
            $smarty->assign('article', $article);
            $smarty->assign('relatedArticles', $relatedStatement->fetchAll());
            $smarty->display('article.tpl');
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            http_response_code(500);
            exit('Ошибка загрузки статьи');
        }
        break;

    default:
        http_response_code(400);
        exit('Неизвестное действие');
}
