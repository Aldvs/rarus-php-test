CREATE TABLE books

(
    `id`         int AUTO_INCREMENT,
    `isbn`       int,
    `book_name`  char(50)      DEFAULT NULL,
    `page_count` int            DEFAULT NULL,
    `genre`      char(10)       DEFAULT NULL,
    `created_at` date NULL DEFAULT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;

CREATE TABLE authors
(
    `id`             int AUTO_INCREMENT,
    `author_surname` char(10) DEFAULT NULL,
    `author_name`    char(10)  DEFAULT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;

CREATE TABLE authors_books
(
    `id`        int AUTO_INCREMENT,
    `author_id` int DEFAULT NULL,
    `book_id`   int DEFAULT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;

CREATE TABLE genre
(
    `id`         int AUTO_INCREMENT,
    `genre_name` char(10) DEFAULT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;

CREATE TABLE books_genre
(
    `id`       int AUTO_INCREMENT,
    `book_id`  int DEFAULT NULL,
    `genre_id` int DEFAULT NULL,
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;

INSERT INTO books (id, ISBN, book_name, page_count, created_at)
VALUES (1, 0000000000001, 'Божественная комендия', 361, '2011-04-10'),
       (2, 0000000000002, 'Мастер и Маргарита', 100, '2014-03-11'),
       (3, 0000000000003, 'Девять кругов ада', 123, '2021-01-14'),
       (4, 0000000000004, 'Тартарары', 123, '2013-07-20'),
       (5, 0000000000005, 'Герой не нашего времени', 435, '2011-02-23'),
       (6, 0000000000006, 'На дне', 1, '1989-02-20'),
       (7, 0000000000007, 'Марсианские хроники', 43, '2020-03-21'),
       (8, 0000000000008, 'С++ для чайников', 300, '2019-08-09'),
       (9, 0000000000009, 'Как управлять людьми', 3, '2001-07-11'),
       (10, 0000000000010, 'MySQL Как правильно создать внешний ключ', 7233, '2022-11-02');

INSERT INTO authors (id, author_surname, author_name)
VALUES (1, 'Алигьери', 'Данте'),
       (2, 'Булгаков', 'Михаил'),
       (3, 'Топлес', 'Илья'),
       (4, 'Первый', 'Петр'),
       (5, 'Дамиров', 'Решат'),
       (6, 'Антонов', 'Олег'),
       (7, 'Насосов', 'Дмитрий'),
       (8, 'Носков', 'Петр'),
       (9, 'Якорь', 'Максим');

INSERT INTO genre (id, genre_name)
VALUES (1, 'FANTASTIKA'),
       (2, 'Genre2'),
       (3, 'Genre3'),
       (4, 'Genre4'),
       (5, 'Genre5'),
       (6, 'Genre6'),
       (7, 'Genre7'),
       (8, 'Genre8'),
       (9, 'Genre8');

INSERT INTO authors_books (id, author_id, book_id)
VALUES (1, 1, 1),
       (2, 1, 7),
       (3, 1, 10),
       (4, 1, 8),
       (5, 2, 7),
       (6, 3, 2),
       (7, 3, 6),
       (8, 4, 7),
       (9, 5, 3),
       (10, 6, 4),
       (11, 7, 5),
       (12, 8, 6),
       (13, 9, 9);

INSERT INTO books_genre (id, book_id, genre_id)
VALUES (1, 1, 1),
       (2, 1, 7),
       (3, 1, 10),
       (4, 1, 8),
       (5, 2, 7),
       (6, 3, 2),
       (7, 3, 6),
       (8, 4, 7),
       (9, 5, 3),
       (10, 6, 4),
       (11, 7, 5),
       (12, 8, 6),
       (13, 9, 9);


