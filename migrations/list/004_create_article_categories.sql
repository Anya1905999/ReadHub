CREATE TABLE IF NOT EXISTS article_categories (
    article_id BIGINT UNSIGNED NOT NULL,
    category_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (article_id, category_id),
    KEY idx_article_categories_category_id (category_id),
    CONSTRAINT fk_article_categories_article
        FOREIGN KEY (article_id) REFERENCES articles (ID)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_article_categories_category
        FOREIGN KEY (category_id) REFERENCES categories (id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
