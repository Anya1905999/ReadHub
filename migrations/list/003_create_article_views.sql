CREATE TABLE IF NOT EXISTS article_views (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    article_id BIGINT UNSIGNED NOT NULL,
    viewed_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_article_views_article_id (article_id),
    KEY idx_article_views_viewed_at (viewed_at),
    CONSTRAINT fk_article_views_article
        FOREIGN KEY (article_id) REFERENCES articles (ID)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
