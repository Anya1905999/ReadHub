CREATE TABLE IF NOT EXISTS articles (
    ID BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    content LONGTEXT NOT NULL,
    category_id BIGINT UNSIGNED NOT NULL,
    image_url VARCHAR(2048) NULL,
    dt_create DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID),
    KEY idx_articles_category_id (category_id),
    KEY idx_articles_dt_create (dt_create),
    CONSTRAINT fk_articles_category
        FOREIGN KEY (category_id) REFERENCES categories (id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
