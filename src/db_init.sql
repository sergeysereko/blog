SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;
SET collation_connection = 'utf8mb4_unicode_ci';

DROP DATABASE IF EXISTS blog;
CREATE DATABASE blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE blog;

CREATE TABLE IF NOT EXISTS users (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     username VARCHAR(50) NOT NULL,
                                     password VARCHAR(255) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS articles (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        title VARCHAR(255) NOT NULL,
                                        content TEXT NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO articles (title, content) VALUES
                                          ('Как быстро уснуть', '-Отправиться спать до 23:00.
-Провести вечер спокойно, даже душ принимать лучше заранее.
-Поужинать за 2-3 часа до сна.
-Исключить синий свет от экранов гаджетов.
-Избегать стресса, эмоционального напряжения и физической активности.
-Засыпать в кромешной темноте.'),
                                          ('Как помыть голову без воды', 'Попробуйте воспользоваться сухими. «Промакивайте» кожу головы, протрите прядь за прядью, чтобы сальные отложения впитывались в бумажную салфетку. То же можно сделать с помощью махрового полотенца или любой чистой хлопчатобумажной ткани. Хорошо протрите волосы, как после мытья.'),
                                          ('Как увидеть ауру человека', 'Увидеть ауру поможет обыкновенная белая стена или ватман. Потребуется попросить человека встать около нее, можно слегка подсветить его. Затем следует сесть напротив на расстоянии 40-50 см и постараться расслабиться. Через какое-то время можно заметить, как от собеседника идет свет.');
