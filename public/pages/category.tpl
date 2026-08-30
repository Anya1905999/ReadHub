<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$category.description|escape}">
    <title>{$category.name|escape} — ReadHub</title>
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
                <a class="main-nav__link is-active" href="/#categories">Категории</a>
            </nav>
        </div>
    </header>
    <main id="main-content">
        <section class="page-intro">
            <div class="container page-intro__inner">
                <nav class="breadcrumbs" aria-label="Хлебные крошки">
                    <a href="/">Главная</a><span aria-hidden="true">/</span><span>{$category.name|escape}</span>
                </nav>
                <div class="page-intro__content">
                    <p class="eyebrow">Категория</p>
                    <h1>{$category.name|escape}</h1>
                    <p>{$category.description|escape}</p>
                </div>
                <p class="page-intro__counter"><strong>{$totalArticles}</strong><span>материалов в подборке</span></p>
            </div>
        </section>
        <section class="catalog">
            <div class="container">
                <div class="catalog__toolbar">
                    <p>Найдено материалов: {$totalArticles}</p>
                    <form class="sort-form" action="/category" method="get">
                        <input type="hidden" name="id" value="{$category.id|escape}">
                        <label for="sort">Сортировать</label>
                        <select id="sort" name="sort">
                            <option value="date_desc"{if $sort == 'date_desc'} selected{/if}>Сначала новые</option>
                            <option value="views_desc"{if $sort == 'views_desc'} selected{/if}>По просмотрам</option>
                            <option value="date_asc"{if $sort == 'date_asc'} selected{/if}>Сначала старые</option>
                        </select>
                        <button class="button button--compact" type="submit">Применить</button>
                    </form>
                </div>
                <div class="post-grid post-grid--catalog">
                    {foreach $articles as $article}
                        <article class="post-card">
                            <a class="post-card__media" href="/article?id={$article.id|escape}" tabindex="-1" aria-hidden="true">
                                {if $article.image_url}
                                    <img src="{$article.image_url|escape}" alt="">
                                {else}
                                    <span class="post-card__placeholder">ReadHub</span>
                                {/if}
                            </a>
                            <div class="post-card__body">
                                <div class="post-card__meta">
                                    <time datetime="{$article.dt_create|date_format:'%Y-%m-%d'}">{$article.dt_create|date_format:'%d.%m.%Y'}</time>
                                    <span class="post-card__views">{$article.views_count|escape} просмотров</span>
                                </div>
                                <h4 class="post-card__title"><a href="/article?id={$article.id|escape}">{$article.name|escape}</a></h4>
                                <p class="post-card__description">{$article.description|escape}</p>
                                <a class="post-card__link" href="/article?id={$article.id|escape}">Читать статью <span aria-hidden="true">→</span></a>
                            </div>
                        </article>
                    {foreachelse}
                        <p>В этой категории пока нет статей.</p>
                    {/foreach}
                </div>
                {if $totalPages > 1}
                    <nav class="pagination" aria-label="Страницы категории">
                        {if $currentPage > 1}
                            <a class="pagination__arrow" href="/category?id={$category.id|escape}&amp;sort={$sort|escape}&amp;page={$previousPage}" aria-label="Предыдущая страница">←</a>
                        {else}
                            <span class="pagination__arrow is-disabled" aria-hidden="true">←</span>
                        {/if}
                        <div class="pagination__pages">
                            {foreach $paginationPages as $paginationPage}
                                <a class="pagination__page{if $paginationPage == $currentPage} is-current{/if}"
                                   href="/category?id={$category.id|escape}&amp;sort={$sort|escape}&amp;page={$paginationPage}"
                                   {if $paginationPage == $currentPage}aria-current="page"{/if}>{$paginationPage}</a>
                            {/foreach}
                        </div>
                        {if $currentPage < $totalPages}
                            <a class="pagination__arrow" href="/category?id={$category.id|escape}&amp;sort={$sort|escape}&amp;page={$nextPage}" aria-label="Следующая страница">→</a>
                        {else}
                            <span class="pagination__arrow is-disabled" aria-hidden="true">→</span>
                        {/if}
                    </nav>
                {/if}
            </div>
        </section>

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
