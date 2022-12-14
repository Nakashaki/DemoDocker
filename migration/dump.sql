CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
    firstName VARCHAR(255),
    lastName  VARCHAR(255),
    gender    CHAR(1),
    roles     JSON         NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author_id  int NOT NULL,
    title varchar(255),
    date datetime,
    CONSTRAINT FK_author_id FOREIGN KEY (author_id) references User(id)
);

CREATE TABLE IF NOT EXISTS Comment
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author_id int NOT NULL,
    post_id int NOT NULL,
    date datetime,
    CONSTRAINT FK_post_id FOREIGN KEY (post_id) REFERENCES Post(id)
);
ALTER TABLE Comment ADD FOREIGN KEY (author_id) REFERENCES User(id);