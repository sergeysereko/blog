CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO articles (title, content) VALUES
('Первая статья', 'Текст первой статьи'),
('Вторая статья', 'Текст второй статьи'),
('Третья статья', 'Текст третьей статьи');
