<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$article.description|escape}">
    <title>{$article.name|escape} — ReadHub</title>
    <link rel="icon" type="image/svg+xml" href="/assets/favicon.svg">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<a class="skip-link" href="#main-content">Перейти к содержимому</a>
<header class="site-header">
    <div class="container site-header__inner">
        <a class="brand" href="/" aria-label="ReadHub — на главную">
            <span class="brand__mark" aria-hidden="true">RH</span>
            <span class="brand__name">ReadHub</span>
        </a>
        <span class="site-header__edition">Журнал обо всём на свете</span>
        <nav class="main-nav" aria-label="Основная навигация">
            <a class="main-nav__link" href="/">Главная</a>
            <a class="main-nav__link" href="/#categories">Категории</a>
        </nav>
    </div>
</header>
<main id="main-content">
    <article class="article">
        <header class="article-header article-header--compact">
            <div class="container article-header__inner">
                <nav class="breadcrumbs breadcrumbs--light" aria-label="Хлебные крошки">
                    <a href="/">Главная</a><span aria-hidden="true">/</span><a href="/category?id={$article.category_id|escape}">{$article.category_name|escape}</a>
                </nav>
                <div class="article-header__content">
                    <a class="article-header__category" href="/category?id={$article.category_id|escape}">{$article.category_name|escape}</a>
                    <h1>{$article.name|escape}</h1>
                    <p class="article-header__description">{$article.description|escape}</p>
                    <div class="article-header__meta">
                        <time datetime="{$article.dt_create|date_format:'%Y-%m-%d'}">{$article.dt_create|date_format:'%d.%m.%Y'}</time>
                    </div>
                </div>
            </div>
        </header>

        <div class="container article__layout">
            <div class="article__main">
                <div class="article__content">
                    {if $article.image_url}
                        <figure class="article__figure">
                            <img class="article__image" src="{$article.image_url|escape}" alt="{$article.name|escape}">
                            <figcaption>{$article.description|escape}</figcaption>
                        </figure>
                    {/if}
                    <div class="article__text">{$article.content nofilter}</div>
                </div>
            </div>

            <aside class="article-aside-stack" aria-label="Информация и похожие статьи">
                <section class="article-aside">
                    <p class="article-aside__label">В этой статье</p>
                    <dl>
                        <div><dt>Опубликовано</dt><dd>{$article.dt_create|date_format:'%d.%m.%Y'}</dd></div>
                        <div><dt>Категория</dt><dd><a href="/category?id={$article.category_id|escape}">{$article.category_name|escape}</a></dd></div>
                    </dl>
                </section>

                <section class="article-related" aria-labelledby="related-title">
                    <p class="article-aside__label">Продолжить чтение</p>
                    <h2 id="related-title">Похожие статьи</h2>
                    <div class="article-related__list">
                        <a class="article-related__item" href="/article">
                            <span>Цифровые права · 21.08</span>
                            <strong>Что означает настоящее согласие на обработку данных</strong>
                            <i aria-hidden="true">→</i>
                        </a>
                        <a class="article-related__item" href="/article">
                            <span>Цифровые права · 16.08</span>
                            <strong>Как данные могут усиливать социальное неравенство</strong>
                            <i aria-hidden="true">→</i>
                        </a>
                        <a class="article-related__item" href="/article">
                            <span>Общество наблюдения · 24.08</span>
                            <strong>Как наблюдение меняет наше поведение</strong>
                            <i aria-hidden="true">→</i>
                        </a>
                    </div>
                </section>
            </aside>
        </div>
    </article>
</main>
<footer class="site-footer">
    <div class="container site-footer__inner">
        <a class="brand brand--footer" href="/">
            <span class="brand__mark" aria-hidden="true">RH</span>
            <span class="brand__name">ReadHub</span>
        </a>
        <p>Приватность защищает пространство для свободного выбора.</p>
        <p class="site-footer__copyright">© 2026 ReadHub</p>
    </div>
</footer>
</body>
</html>
