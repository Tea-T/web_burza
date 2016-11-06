/* podaci za tablicu */

INSERT INTO autor (id, ime) VALUES
(1, 'tester'),
(2, 'pero'),
(3, 'ana');

INSERT INTO komentar (id, tekst, vrijeme, autor) VALUES
(1, 'A huge community of Symfony fans committed to take PHP to the next level.', '2016-06-05 11:13:15', 'ana'),
(2, 'no comment', '2015-10-11 11:10:14', 'tester'),
(3, 'jos uvijek no comment', '2015-11-11 08:22:54', 'tester'),
(4, 'da li radi?', '2016-01-09 18:55:59', 'pero'),
(5, 'hello', '2016-04-10 13:15:18', 'ana'),
(6, 'ima li koga?', '2016-07-08 01:03:47', 'pero'),
(7, 'sad imam komentar', '2016-02-25 14:14:16', 'tester'),
(8, 'napokon mi ne javlja error', '2016-03-22 23:38:36', 'tester'),
(9, 'world', '2016-04-10 13:15:53', 'ana'),
(10, 'testing...', '2016-04-10 09:52:51', 'tester'),
(11, 'jos uvijek nema nikoga', '2016-07-09 00:13:15', 'pero'),
(12, 'bez komentara', '2016-05-06 09:33:30', 'tester'),
(13, 'opet ja', '2016-06-05 11:15:15', 'tester');