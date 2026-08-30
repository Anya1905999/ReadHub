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

$additionalArticleTitles = [
    'Спорт' => [
        'Как выбрать вид спорта, который подходит именно вам',
        'Силовые тренировки для начинающих',
        'Почему восстановление важно не меньше тренировки',
        'Как правильно делать разминку перед нагрузкой',
        'Основы спортивного питания без сложных схем',
        'Как организовать эффективные тренировки дома',
        'Что такое пульсовые зоны и зачем их учитывать',
        'Как командный спорт развивает полезные навыки',
        'Как подготовиться к своему первому забегу',
    ],
    'Медицина' => [
        'Как наладить здоровый режим сна',
        'Что важно знать о диспансеризации',
        'Как правильно измерять артериальное давление',
        'Почему нельзя принимать антибиотики без назначения',
        'Как поддерживать здоровье сердца каждый день',
        'Что такое доказательная медицина',
        'Как подготовиться к визиту к врачу',
        'Почему важно следить за уровнем стресса',
        'Какие привычки помогают укреплять иммунитет',
    ],
    'Экология' => [
        'Как сократить количество бытовых отходов',
        'Зачем сортировать мусор дома',
        'Как экономить воду без потери комфорта',
        'Почему биоразнообразие важно для человека',
        'Как транспорт влияет на качество воздуха',
        'Что такое углеродный след',
        'Как сделать повседневные покупки экологичнее',
        'Почему восстановление лесов требует планирования',
        'Как изменение климата влияет на города',
    ],
    'Технологии' => [
        'Как работают облачные сервисы',
        'Что нужно знать о защите персональных данных',
        'Как выбрать смартфон под свои задачи',
        'Почему двухфакторная аутентификация повышает безопасность',
        'Что такое интернет вещей',
        'Как нейросети создают изображения и тексты',
        'Почему резервные копии действительно необходимы',
        'Как устроены современные поисковые системы',
        'Какие технологии меняют умные города',
    ],
    'Наука' => [
        'Как учёные изучают далёкие галактики',
        'Что известно о тёмной материи',
        'Как работает научный метод',
        'Почему квантовая физика отличается от классической',
        'Как исследователи прогнозируют погоду',
        'Что палеонтология рассказывает о прошлом Земли',
        'Как открывают новые виды живых организмов',
        'Почему исследования океана так важны',
        'Как создаются новые материалы',
    ],
    'Образование' => [
        'Как эффективно конспектировать учебный материал',
        'Почему полезно учиться небольшими блоками',
        'Как выбрать онлайн-курс и не бросить его',
        'Что помогает развивать критическое мышление',
        'Как подготовиться к важному экзамену',
        'Почему ошибки необходимы для обучения',
        'Как создать удобное место для занятий',
        'Что такое интервальное повторение',
        'Как поддерживать мотивацию во время учёбы',
    ],
    'Экономика' => [
        'Как работает инфляция простыми словами',
        'Зачем нужна финансовая подушка',
        'Что важно знать о банковских вкладах',
        'Как процентные ставки влияют на экономику',
        'Почему меняются валютные курсы',
        'Как малый бизнес влияет на развитие городов',
        'Что такое диверсификация сбережений',
        'Как технологии меняют рынок труда',
        'Почему важно планировать крупные покупки',
    ],
    'Путешествия' => [
        'Как собрать компактный багаж',
        'Что проверить перед поездкой за границу',
        'Как составить маршрут по новому городу',
        'Почему стоит путешествовать в низкий сезон',
        'Как выбрать подходящее жильё в поездке',
        'Что взять с собой в поход выходного дня',
        'Как экономить в путешествии без потери комфорта',
        'Почему полезно изучать местные традиции',
        'Как подготовиться к длительному перелёту',
    ],
    'Культура' => [
        'Как начать разбираться в современном искусстве',
        'Почему музеи меняются вместе с обществом',
        'Как музыка влияет на настроение',
        'Что делает фильм классикой',
        'Почему театру удаётся оставаться актуальным',
        'Как вести читательский дневник',
        'Что такое культурное наследие',
        'Как появились первые публичные библиотеки',
        'Почему фестивали важны для городской культуры',
    ],
    'Автомобили' => [
        'Как подготовить автомобиль к дальней поездке',
        'Что означают индикаторы на приборной панели',
        'Как выбрать зимние шины',
        'Почему важно регулярно проверять давление в шинах',
        'Как работают современные системы помощи водителю',
        'Что нужно знать о гибридных автомобилях',
        'Как ухаживать за аккумулятором автомобиля',
        'Почему аэродинамика влияет на расход топлива',
        'Как меняется общественный транспорт будущего',
    ],
];

$additionalArticleImages = [
    'Спорт' => [
        'Как выбрать вид спорта, который подходит именно вам' => 'https://unsplash.com/photos/PfQh55R0ZtE/download?force=true&w=1200',
        'Силовые тренировки для начинающих' => 'https://unsplash.com/photos/bE6k8SQT2FQ/download?force=true&w=1200',
        'Почему восстановление важно не меньше тренировки' => 'https://unsplash.com/photos/lT1OseWogDc/download?force=true&w=1200',
        'Как правильно делать разминку перед нагрузкой' => 'https://unsplash.com/photos/gJtDg6WfMlQ/download?force=true&w=1200',
        'Основы спортивного питания без сложных схем' => 'https://unsplash.com/photos/IzdLRdXcNT8/download?force=true&w=1200',
        'Как организовать эффективные тренировки дома' => 'https://unsplash.com/photos/tj27cwu86Wk/download?force=true&w=1200',
        'Что такое пульсовые зоны и зачем их учитывать' => 'https://unsplash.com/photos/f4RBYsY2hxA/download?force=true&w=1200',
        'Как командный спорт развивает полезные навыки' => 'https://unsplash.com/photos/8BXVwk0n2vM/download?force=true&w=1200',
        'Как подготовиться к своему первому забегу' => 'https://unsplash.com/photos/d3bYmnZ0ank/download?force=true&w=1200',
    ],
    'Медицина' => [
        'Как наладить здоровый режим сна' => 'https://unsplash.com/photos/S1v7hVUiCg0/download?force=true&w=1200',
        'Что важно знать о диспансеризации' => 'https://unsplash.com/photos/NFvdKIhxYlU/download?force=true&w=1200',
        'Как правильно измерять артериальное давление' => 'https://unsplash.com/photos/nss2eRzQwgw/download?force=true&w=1200',
        'Почему нельзя принимать антибиотики без назначения' => 'https://unsplash.com/photos/yo01Z-9HQAw/download?force=true&w=1200',
        'Как поддерживать здоровье сердца каждый день' => 'https://unsplash.com/photos/RS0-h_pyByk/download?force=true&w=1200',
        'Что такое доказательная медицина' => 'https://unsplash.com/photos/jwWtZrm67VI/download?force=true&w=1200',
        'Как подготовиться к визиту к врачу' => 'https://unsplash.com/photos/tE7_jvK-_YU/download?force=true&w=1200',
        'Почему важно следить за уровнем стресса' => 'https://unsplash.com/photos/w8p9cQDLX7I/download?force=true&w=1200',
        'Какие привычки помогают укреплять иммунитет' => 'https://unsplash.com/photos/tMFeatBSS4s/download?force=true&w=1200',
    ],
    'Экология' => [
        'Как сократить количество бытовых отходов' => 'https://unsplash.com/photos/_RBcxo9AU-U/download?force=true&w=1200',
        'Зачем сортировать мусор дома' => 'https://unsplash.com/photos/Rfflri94rs8/download?force=true&w=1200',
        'Как экономить воду без потери комфорта' => 'https://unsplash.com/photos/01_igFr7hd4/download?force=true&w=1200',
        'Почему биоразнообразие важно для человека' => 'https://unsplash.com/photos/x8ZStukS2PM/download?force=true&w=1200',
        'Как транспорт влияет на качество воздуха' => 'https://unsplash.com/photos/pF_2lrjWiJE/download?force=true&w=1200',
        'Что такое углеродный след' => 'https://unsplash.com/photos/WgGJjGN4_ck/download?force=true&w=1200',
        'Как сделать повседневные покупки экологичнее' => 'https://unsplash.com/photos/x1w_Q78xNEY/download?force=true&w=1200',
        'Почему восстановление лесов требует планирования' => 'https://unsplash.com/photos/19SC2oaVZW0/download?force=true&w=1200',
        'Как изменение климата влияет на города' => 'https://unsplash.com/photos/0w-uTa0Xz7w/download?force=true&w=1200',
    ],
    'Технологии' => [
        'Как работают облачные сервисы' => 'https://unsplash.com/photos/EUsVwEOsblE/download?force=true&w=1200',
        'Что нужно знать о защите персональных данных' => 'https://unsplash.com/photos/_0iV9LmPDn0/download?force=true&w=1200',
        'Как выбрать смартфон под свои задачи' => 'https://unsplash.com/photos/eGGFZ5X2LnA/download?force=true&w=1200',
        'Почему двухфакторная аутентификация повышает безопасность' => 'https://unsplash.com/photos/FHgWFzDDAOs/download?force=true&w=1200',
        'Что такое интернет вещей' => 'https://unsplash.com/photos/ZPOoDQc8yMw/download?force=true&w=1200',
        'Как нейросети создают изображения и тексты' => 'https://unsplash.com/photos/fwbUN8IYvQY/download?force=true&w=1200',
        'Почему резервные копии действительно необходимы' => 'https://unsplash.com/photos/WhAQMsdRKMI/download?force=true&w=1200',
        'Как устроены современные поисковые системы' => 'https://unsplash.com/photos/U9e6ySWMW_0/download?force=true&w=1200',
        'Какие технологии меняют умные города' => 'https://unsplash.com/photos/gVQLAbGVB6Q/download?force=true&w=1200',
    ],
    'Наука' => [
        'Как учёные изучают далёкие галактики' => 'https://unsplash.com/photos/ct10qdGv1hQ/download?force=true&w=1200',
        'Что известно о тёмной материи' => 'https://unsplash.com/photos/lQGJCMY5qcM/download?force=true&w=1200',
        'Как работает научный метод' => 'https://unsplash.com/photos/RlOAwXt2fEA/download?force=true&w=1200',
        'Почему квантовая физика отличается от классической' => 'https://unsplash.com/photos/gKUC4TMhOiY/download?force=true&w=1200',
        'Как исследователи прогнозируют погоду' => 'https://unsplash.com/photos/L7en7Lb-Ovc/download?force=true&w=1200',
        'Что палеонтология рассказывает о прошлом Земли' => 'https://unsplash.com/photos/tGYrlchfObE/download?force=true&w=1200',
        'Как открывают новые виды живых организмов' => 'https://unsplash.com/photos/8yS04veb1TQ/download?force=true&w=1200',
        'Почему исследования океана так важны' => 'https://unsplash.com/photos/XknuBmnjbKg/download?force=true&w=1200',
        'Как создаются новые материалы' => 'https://unsplash.com/photos/6NMcUDG37Yc/download?force=true&w=1200',
    ],
    'Образование' => [
        'Как эффективно конспектировать учебный материал' => 'https://unsplash.com/photos/ev3Xqhr_0pI/download?force=true&w=1200',
        'Почему полезно учиться небольшими блоками' => 'https://unsplash.com/photos/klbApl9mxr0/download?force=true&w=1200',
        'Как выбрать онлайн-курс и не бросить его' => 'https://unsplash.com/photos/JY9bBAcs0vs/download?force=true&w=1200',
        'Что помогает развивать критическое мышление' => 'https://unsplash.com/photos/NGLWZV4xOPg/download?force=true&w=1200',
        'Как подготовиться к важному экзамену' => 'https://unsplash.com/photos/dPQBwZ6d-NU/download?force=true&w=1200',
        'Почему ошибки необходимы для обучения' => 'https://unsplash.com/photos/v4DVZst1MhA/download?force=true&w=1200',
        'Как создать удобное место для занятий' => 'https://unsplash.com/photos/sp6F_ox9Ph8/download?force=true&w=1200',
        'Что такое интервальное повторение' => 'https://unsplash.com/photos/wAgfqXpYqug/download?force=true&w=1200',
        'Как поддерживать мотивацию во время учёбы' => 'https://unsplash.com/photos/O5AUshHn28A/download?force=true&w=1200',
    ],
    'Экономика' => [
        'Как работает инфляция простыми словами' => 'https://unsplash.com/photos/XrIfY_4cK1w/download?force=true&w=1200',
        'Зачем нужна финансовая подушка' => 'https://unsplash.com/photos/OApHds2yEGQ/download?force=true&w=1200',
        'Что важно знать о банковских вкладах' => 'https://unsplash.com/photos/1zO4O3Z0UJA/download?force=true&w=1200',
        'Как процентные ставки влияют на экономику' => 'https://unsplash.com/photos/Wb63zqJ5gnE/download?force=true&w=1200',
        'Почему меняются валютные курсы' => 'https://unsplash.com/photos/WZ5z7o_6HSU/download?force=true&w=1200',
        'Как малый бизнес влияет на развитие городов' => 'https://unsplash.com/photos/CktZjrBaM8s/download?force=true&w=1200',
        'Что такое диверсификация сбережений' => 'https://unsplash.com/photos/9VJu3QUgmdA/download?force=true&w=1200',
        'Как технологии меняют рынок труда' => 'https://unsplash.com/photos/VOWQ4wBn094/download?force=true&w=1200',
        'Почему важно планировать крупные покупки' => 'https://unsplash.com/photos/zR7nFjjIAWE/download?force=true&w=1200',
    ],
    'Путешествия' => [
        'Как собрать компактный багаж' => 'https://unsplash.com/photos/M0AWNxnLaMw/download?force=true&w=1200',
        'Что проверить перед поездкой за границу' => 'https://unsplash.com/photos/O453M2Liufs/download?force=true&w=1200',
        'Как составить маршрут по новому городу' => 'https://unsplash.com/photos/A5rCN8626Ck/download?force=true&w=1200',
        'Почему стоит путешествовать в низкий сезон' => 'https://unsplash.com/photos/rknrvCrfS1k/download?force=true&w=1200',
        'Как выбрать подходящее жильё в поездке' => 'https://unsplash.com/photos/bMIlyKZHKMY/download?force=true&w=1200',
        'Что взять с собой в поход выходного дня' => 'https://unsplash.com/photos/UmV2wr-Vbq8/download?force=true&w=1200',
        'Как экономить в путешествии без потери комфорта' => 'https://unsplash.com/photos/hpTH5b6mo2s/download?force=true&w=1200',
        'Почему полезно изучать местные традиции' => 'https://unsplash.com/photos/eOcyhe5-9sQ/download?force=true&w=1200',
        'Как подготовиться к длительному перелёту' => 'https://unsplash.com/photos/oCdVtGFeDC0/download?force=true&w=1200',
    ],
    'Культура' => [
        'Как начать разбираться в современном искусстве' => 'https://unsplash.com/photos/rPOmLGwai2w/download?force=true&w=1200',
        'Почему музеи меняются вместе с обществом' => 'https://unsplash.com/photos/fEVaiLwWvlU/download?force=true&w=1200',
        'Как музыка влияет на настроение' => 'https://unsplash.com/photos/MlhJNEUQpBs/download?force=true&w=1200',
        'Что делает фильм классикой' => 'https://unsplash.com/photos/HwU5H9Y6aL8/download?force=true&w=1200',
        'Почему театру удаётся оставаться актуальным' => 'https://unsplash.com/photos/n8rK2ALPHTY/download?force=true&w=1200',
        'Как вести читательский дневник' => 'https://unsplash.com/photos/evlkOfkQ5rE/download?force=true&w=1200',
        'Что такое культурное наследие' => 'https://unsplash.com/photos/p6rNTdAPbuk/download?force=true&w=1200',
        'Как появились первые публичные библиотеки' => 'https://unsplash.com/photos/WW1jsInXgwM/download?force=true&w=1200',
        'Почему фестивали важны для городской культуры' => 'https://unsplash.com/photos/AtPWnYNDJnM/download?force=true&w=1200',
    ],
    'Автомобили' => [
        'Как подготовить автомобиль к дальней поездке' => 'https://unsplash.com/photos/_4sWbzH5fp8/download?force=true&w=1200',
        'Что означают индикаторы на приборной панели' => 'https://unsplash.com/photos/3ZUsNJhi_Ik/download?force=true&w=1200',
        'Как выбрать зимние шины' => 'https://unsplash.com/photos/6lSBynPRaAQ/download?force=true&w=1200',
        'Почему важно регулярно проверять давление в шинах' => 'https://unsplash.com/photos/ZRns2R5azu0/download?force=true&w=1200',
        'Как работают современные системы помощи водителю' => 'https://unsplash.com/photos/YApiWyp0lqo/download?force=true&w=1200',
        'Что нужно знать о гибридных автомобилях' => 'https://unsplash.com/photos/m3m-lnR90uM/download?force=true&w=1200',
        'Как ухаживать за аккумулятором автомобиля' => 'https://unsplash.com/photos/d1Jum1vVLew/download?force=true&w=1200',
        'Почему аэродинамика влияет на расход топлива' => 'https://unsplash.com/photos/eqW1MPinEV4/download?force=true&w=1200',
        'Как меняется общественный транспорт будущего' => 'https://unsplash.com/photos/aiwuLjLPFnU/download?force=true&w=1200',
    ],
];

// Проверяем, что для каждой дополнительной статьи задана отдельная картинка.
foreach ($additionalArticleTitles as $categoryName => $titles) {
    $images = $additionalArticleImages[$categoryName] ?? [];

    foreach ($titles as $title) {
        if (!isset($images[$title])) {
            throw new LogicException("Не задана картинка для статьи «{$title}».");
        }
    }
}

$publicationDate = new DateTimeImmutable('2026-08-20 09:00:00');
$publicationOffset = 0;

foreach ($additionalArticleTitles as $categoryName => $titles) {
    foreach ($titles as $title) {
        $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $safeCategoryName = htmlspecialchars($categoryName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        $articles[] = [
            'category' => $categoryName,
            'name' => $title,
            'description' => "Разбираем тему «{$title}»: ключевые факты, практические советы и понятные примеры.",
            'content' => sprintf(
                '<h2>%s</h2><p>Этот материал категории «%s» знакомит с основными понятиями темы и помогает увидеть, как они связаны с повседневной жизнью.</p><p>Начните с базовых принципов, сравнивайте разные источники и применяйте рекомендации постепенно. Такой подход помогает лучше разобраться в вопросе и сделать собственные выводы.</p>',
                $safeTitle,
                $safeCategoryName
            ),
            'image_url' => $additionalArticleImages[$categoryName][$title],
            'dt_create' => $publicationDate
                ->modify(sprintf('-%d days', $publicationOffset))
                ->format('Y-m-d H:i:s'),
        ];

        $publicationOffset++;
    }
}

$articleImageUrls = array_column($articles, 'image_url');

if (count($articleImageUrls) !== count(array_unique($articleImageUrls))) {
    throw new LogicException('У статей обнаружены повторяющиеся картинки.');
}

$articleCountsByCategory = array_fill_keys(array_column($categories, 'name'), 0);

foreach ($articles as $article) {
    $articleCountsByCategory[$article['category']]++;
}

foreach ($articleCountsByCategory as $categoryName => $articleCount) {
    if ($articleCount !== 10) {
        throw new LogicException(
            "Для категории «{$categoryName}» подготовлено {$articleCount} статей вместо 10."
        );
    }
}

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
