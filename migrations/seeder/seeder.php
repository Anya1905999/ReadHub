<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$categories = [
    ['name' => 'Спорт', 'description' => 'Новости спорта, тренировки, соревнования и здоровый образ жизни'],
    ['name' => 'Медицина', 'description' => 'Материалы о здоровье, медицине и профилактике заболеваний'],
    ['name' => 'Экология', 'description' => 'Экология, климат, природа и защита окружающей среды'],
    ['name' => 'Технологии', 'description' => 'Современные технологии, IT, гаджеты и искусственный интеллект'],
    ['name' => 'Наука', 'description' => 'Научные открытия, исследования, космос и новые технологии'],
    ['name' => 'Образование', 'description' => 'Обучение, университеты, школы и развитие навыков'],
    ['name' => 'Экономика', 'description' => 'Экономика, финансы, бизнес и рынки'],
    ['name' => 'Путешествия', 'description' => 'Страны, города, туризм и советы путешественникам'],
    ['name' => 'Культура', 'description' => 'Кино, музыка, литература, искусство и культурные события'],
    ['name' => 'Автомобили', 'description' => 'Автомобили, транспорт, электромобили и автомобильные технологии'],
];

$articles = [
    [
        'category' => 'Спорт',
        'name' => 'Как начать заниматься бегом',
        'description' => 'Основные рекомендации для тех, кто хочет начать бегать.',
        'content' => <<<'HTML'
<h2>Начните с комфортного темпа</h2>
<p>Первые тренировки лучше строить на чередовании ходьбы и лёгкого бега. Такой подход помогает сердечно-сосудистой системе и мышцам постепенно привыкнуть к нагрузке.</p>
<p>Выберите удобные кроссовки, сделайте короткую разминку и следите за самочувствием. Для начала достаточно трёх тренировок в неделю по двадцать–тридцать минут.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1552674605-db6ffd4facb5?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-30 09:00:00',
    ],
    [
        'category' => 'Медицина',
        'name' => 'Почему профилактика важнее лечения',
        'description' => 'Регулярные обследования и полезные привычки помогают вовремя заметить риски для здоровья.',
        'content' => <<<'HTML'
<h2>Здоровье требует внимания заранее</h2>
<p>Профилактические осмотры помогают обнаружить изменения до появления выраженных симптомов. Частоту обследований следует обсуждать с врачом с учётом возраста и факторов риска.</p>
<p>Сон, движение, сбалансированное питание и отказ от курения остаются основой профилактики многих хронических заболеваний.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-29 09:00:00',
    ],
    [
        'category' => 'Экология',
        'name' => 'Почему городам нужны зелёные пространства',
        'description' => 'Парки и деревья улучшают микроклимат города и делают повседневную среду комфортнее.',
        'content' => <<<'HTML'
<h2>Природа внутри города</h2>
<p>Деревья дают тень, задерживают пыль и помогают снижать температуру улиц в жаркие дни. Зелёные маршруты также делают пешие прогулки привлекательнее.</p>
<p>Чтобы озеленение работало долго, важно выбирать подходящие виды растений и заранее планировать уход за ними.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-28 09:00:00',
    ],
    [
        'category' => 'Технологии',
        'categories' => ['Технологии', 'Наука'],
        'name' => 'Как искусственный интеллект меняет повседневные сервисы',
        'description' => 'Алгоритмы помогают искать информацию, переводить тексты и автоматизировать рутинные задачи.',
        'content' => <<<'HTML'
<h2>Технология становится незаметной</h2>
<p>Системы искусственного интеллекта уже используются в поиске, навигации, рекомендациях и поддержке клиентов. Пользователь видит удобный интерфейс, а сложная обработка происходит в фоновом режиме.</p>
<p>Вместе с удобством важны прозрачность, защита данных и возможность человека проверить результат автоматического решения.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-27 09:00:00',
    ],
    [
        'category' => 'Наука',
        'name' => 'Зачем человечеству исследовать космос',
        'description' => 'Космические исследования расширяют знания о Вселенной и создают полезные технологии.',
        'content' => <<<'HTML'
<h2>Исследования за пределами Земли</h2>
<p>Наблюдения и автоматические миссии помогают изучать происхождение планет, поведение звёзд и условия, в которых может существовать жизнь.</p>
<p>Разработки для космоса находят применение в связи, навигации, прогнозировании погоды и мониторинге природных процессов.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-26 09:00:00',
    ],
    [
        'category' => 'Образование',
        'name' => 'Как выстроить устойчивую привычку учиться',
        'description' => 'Небольшие регулярные занятия дают более устойчивый результат, чем редкие интенсивные попытки.',
        'content' => <<<'HTML'
<h2>Регулярность важнее длительности</h2>
<p>Определите конкретное время для занятий и разбивайте большую тему на короткие задачи. После каждого блока полезно воспроизводить материал по памяти.</p>
<p>Отмечайте прогресс и возвращайтесь к сложным вопросам через несколько дней — интервальное повторение помогает сохранить знания надолго.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-25 09:00:00',
    ],
    [
        'category' => 'Экономика',
        'name' => 'Как составить личный бюджет',
        'description' => 'Простой учёт доходов и расходов помогает принимать более осознанные финансовые решения.',
        'content' => <<<'HTML'
<h2>Сначала зафиксируйте реальную картину</h2>
<p>Записывайте обязательные и переменные расходы в течение месяца. После этого определите сумму, которую можно регулярно направлять на финансовую подушку и долгосрочные цели.</p>
<p>Бюджет не должен запрещать все необязательные покупки — его задача состоит в том, чтобы заранее распределить деньги по приоритетам.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-24 09:00:00',
    ],
    [
        'category' => 'Путешествия',
        'name' => 'Как подготовиться к самостоятельному путешествию',
        'description' => 'Маршрут, документы и разумный запас времени делают поездку спокойнее.',
        'content' => <<<'HTML'
<h2>Планируйте главное, оставляйте место открытиям</h2>
<p>Проверьте срок действия документов, правила въезда, медицинскую страховку и способы оплаты. Сохраните копии важных данных отдельно от оригиналов.</p>
<p>Заранее выберите основные точки маршрута, но не заполняйте каждую минуту — свободное время помогает лучше почувствовать новое место.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-23 09:00:00',
    ],
    [
        'category' => 'Культура',
        'name' => 'Почему чтение остаётся важной культурной практикой',
        'description' => 'Книги помогают понимать чужой опыт, развивать внимание и сохранять культурную память.',
        'content' => <<<'HTML'
<h2>Диалог между читателем и текстом</h2>
<p>Чтение требует времени и внимания, поэтому даёт возможность глубже проследить развитие идеи или характера. Один и тот же текст может открываться по-разному на разных этапах жизни.</p>
<p>Библиотеки, книжные клубы и публичные обсуждения превращают индивидуальное чтение в пространство культурного обмена.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-22 09:00:00',
    ],
    [
        'category' => 'Автомобили',
        'name' => 'Как электромобили меняют городской транспорт',
        'description' => 'Развитие зарядной инфраструктуры постепенно делает электрический транспорт доступнее.',
        'content' => <<<'HTML'
<h2>Транспорт становится электрическим</h2>
<p>Электромобили не создают выхлопных газов во время движения и могут снижать уровень шума на городских улицах. Итоговый экологический эффект зависит от способа производства электроэнергии.</p>
<p>Для массового перехода необходимы удобные зарядные станции, понятные тарифы и возможность заряжать автомобиль рядом с домом или работой.</p>
HTML,
        'image_url' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1200&q=80',
        'dt_create' => '2026-08-21 09:00:00',
    ],
];

try {
    /** @var PDO $pdo */
    $pdo = require __DIR__ . '/../../config/db.php';
    $pdo->beginTransaction();

    $findCategory = $pdo->prepare('SELECT id FROM categories WHERE name = :name LIMIT 1');
    $insertCategory = $pdo->prepare(
        'INSERT INTO categories (name, description) VALUES (:name, :description)'
    );
    $updateCategory = $pdo->prepare(
        'UPDATE categories SET description = :description WHERE id = :id'
    );

    $categoryIds = [];
    $createdCategories = 0;
    $updatedCategories = 0;

    foreach ($categories as $category) {
        $findCategory->execute(['name' => $category['name']]);
        $categoryId = $findCategory->fetchColumn();

        if ($categoryId === false) {
            $insertCategory->execute($category);
            $categoryId = (int) $pdo->lastInsertId();
            $createdCategories++;
        } else {
            $categoryId = (int) $categoryId;
            $updateCategory->execute([
                'id' => $categoryId,
                'description' => $category['description'],
            ]);
            $updatedCategories++;
        }

        $categoryIds[$category['name']] = $categoryId;
    }

    $findArticle = $pdo->prepare(
        'SELECT ID FROM articles WHERE name = :name LIMIT 1'
    );
    $insertArticle = $pdo->prepare(
        'INSERT INTO articles
            (name, description, content, category_id, image_url, dt_create)
         VALUES
            (:name, :description, :content, :category_id, :image_url, :dt_create)'
    );
    $updateArticle = $pdo->prepare(
        'UPDATE articles
         SET category_id = :category_id,
             description = :description,
             content = :content,
             image_url = :image_url,
             dt_create = :dt_create
         WHERE ID = :id'
    );
    $deleteArticleCategories = $pdo->prepare(
        'DELETE FROM article_categories WHERE article_id = :article_id'
    );
    $insertArticleCategory = $pdo->prepare(
        'INSERT INTO article_categories (article_id, category_id)
         VALUES (:article_id, :category_id)'
    );

    $createdArticles = 0;
    $updatedArticles = 0;

    foreach ($articles as $article) {
        $articleCategoryNames = $article['categories'] ?? [$article['category']];
        $articleCategoryIds = [];

        foreach (array_unique($articleCategoryNames) as $categoryName) {
            $categoryId = $categoryIds[$categoryName] ?? null;

            if ($categoryId === null) {
                throw new RuntimeException("Не найдена категория: {$categoryName}");
            }

            $articleCategoryIds[] = $categoryId;
        }

        if ($articleCategoryIds === []) {
            throw new RuntimeException("У статьи нет категорий: {$article['name']}");
        }

        $primaryCategoryId = $articleCategoryIds[0];
        $findArticle->execute(['name' => $article['name']]);
        $articleId = $findArticle->fetchColumn();

        $parameters = [
            'category_id' => $primaryCategoryId,
            'description' => $article['description'],
            'content' => $article['content'],
            'image_url' => $article['image_url'],
            'dt_create' => $article['dt_create'],
        ];

        if ($articleId === false) {
            $insertArticle->execute([
                'name' => $article['name'],
                ...$parameters,
            ]);
            $articleId = (int) $pdo->lastInsertId();
            $createdArticles++;
        } else {
            $articleId = (int) $articleId;
            $updateArticle->execute([
                'id' => $articleId,
                ...$parameters,
            ]);
            $updatedArticles++;
        }

        $deleteArticleCategories->execute(['article_id' => $articleId]);

        foreach ($articleCategoryIds as $categoryId) {
            $insertArticleCategory->execute([
                'article_id' => $articleId,
                'category_id' => $categoryId,
            ]);
        }
    }

    $pdo->commit();

    printf(
        "Сидинг завершён. Категории: создано %d, обновлено %d. Статьи: создано %d, обновлено %d.\n",
        $createdCategories,
        $updatedCategories,
        $createdArticles,
        $updatedArticles
    );
} catch (Throwable $exception) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }

    fwrite(STDERR, "Ошибка сидинга: {$exception->getMessage()}\n");
    exit(1);
}
