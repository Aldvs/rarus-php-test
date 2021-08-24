SELECT author_name
FROM (SELECT author_name, COUNT(*) as cnt
FROM authors_books
INNER JOIN authors on authors.id = authors_books.author_id
GROUP BY author_id ORDER BY cnt DESC ) subQ
LIMIT 1;