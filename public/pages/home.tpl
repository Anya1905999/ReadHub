<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Блог обо всём на свете">
    <title>ReadHub — читай обо всём на свете</title>
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
                <a class="main-nav__link is-active" href="/">Главная</a>
            </nav>
        </div>
    </header>
    <main id="main-content">
  <section class="category-chooser" aria-labelledby="category-question">
    <div class="container">
      <header class="category-chooser__header">
        <p class="eyebrow">Выберите направление</p>
        <h2 id="category-question">Какая категория вам сегодня интересна?</h2>
        <p>Перейдите к подборке и читайте материалы только по выбранной теме.</p>
      </header>
      <div class="category-options">
        {foreach $categories as $category}
          <a class="category-option" href="/category?id={$category.id|escape}">
            <span class="category-option__number" aria-hidden="true">{$category@iteration|string_format:"%02d"}</span>
            <span class="category-option__content">
              <strong>{$category.name|escape}</strong>
              <span>{$category.description|escape}</span>
            </span>
            <span class="category-option__arrow" aria-hidden="true">→</span>
          </a>
        {foreachelse}
          <p>Категории пока не добавлены.</p>
        {/foreach}
      </div>
    </div>
  </section>

  <section class="latest-posts" id="latest" aria-labelledby="latest-title">
    <div class="container">
      <header class="section-heading">
        <div><p class="eyebrow">Свежие материалы</p><h1 id="latest-title">Новые публикации</h1></div>
        <p>Последние статьи из всех категорий — в порядке публикации.</p>
      </header>
      <div class="post-grid post-grid--latest">
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
              <a class="post-card__category" href="/category?id={$article.category_id|escape}">{$article.category_name|escape}</a>
              <div class="post-card__meta">
                <time datetime="{$article.dt_create|date_format:'%Y-%m-%d'}">{$article.dt_create|date_format:'%d.%m.%Y'}</time>
              </div>
              <h3 class="post-card__title"><a href="/article?id={$article.id|escape}">{$article.name|escape}</a></h3>
              <p class="post-card__description">{$article.description|escape}</p>
              <a class="post-card__link" href="/article?id={$article.id|escape}">Читать статью <span aria-hidden="true">→</span></a>
            </div>
          </article>
        {foreachelse}
          <p>Статьи пока не добавлены.</p>
        {/foreach}
      </div>
    </div>
  </section>
</main>
    <footer class="site-footer">
        <div class="container site-footer__inner">
            <a class="brand brand--footer" href="/">
                <span class="brand__mark" aria-hidden="true">RH</span>
                <span class="brand__name">ReadHub</span>
            </a>
            <p>Стань более эрудированным.</p>
            <p class="site-footer__copyright">© 2026 ReadHub</p>
        </div>
    </footer>
</body>
</html>
