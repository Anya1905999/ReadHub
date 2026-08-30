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
            c.description AS category_description
         FROM articles AS a
         INNER JOIN categories AS c ON c.id = a.category_id
         WHERE a.ID = :id'
    );

            $statement->execute(['id' => $articleId]);

            $article = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$article) {
                http_response_code(404);
                exit('Статья не найдена');
            }

            $smarty = new Smarty();
            $smarty->setTemplateDir(__DIR__ . '/../pages/');
            $smarty->setCompileDir(sys_get_temp_dir());
            $smarty->assign('article', $article);
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
