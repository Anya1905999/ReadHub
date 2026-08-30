INSERT IGNORE INTO article_categories (article_id, category_id)
SELECT ID, category_id
FROM articles
WHERE category_id IS NOT NULL;
