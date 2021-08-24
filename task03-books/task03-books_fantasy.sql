SELECT book_name, author_name, genre_name
FROM books
         INNER JOIN authors_books ab on books.id = ab.book_id
         INNER JOIN authors a on a.id = ab.book_id
         INNER JOIN books_genre bg on books.id = bg.book_id
         INNER JOIN genre g on bg.genre_id = g.id
WHERE genre_name = 'FANTASTIKA';