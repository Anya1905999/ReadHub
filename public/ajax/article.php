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
                    a.category_id,
                    a.image_url,
                    a.dt_create,
                    c.name AS category_name,
                    c.description AS category_description,
                    COALESCE(article_view_totals.views_count, 0) AS views_count
                 FROM articles AS a
                 INNER JOIN categories AS c ON c.id = a.category_id
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
                 WHERE a.category_id = :category_id
                   AND a.ID <> :article_id
                 ORDER BY RAND()
                 LIMIT 3'
            );
            $relatedStatement->bindValue(':category_id', (int) $article['category_id'], PDO::PARAM_INT);
            $relatedStatement->bindValue(':article_id', $articleId, PDO::PARAM_INT);
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
