CREATE DATABASE vhs_db;
USE vhs_db;

-- T A B L E S --

CREATE TABLE users (
    id VARCHAR(23) PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(150) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    date_birthday DATE NOT NULL,
    bio VARCHAR(255) DEFAULT NULL,
    avatar_url TEXT DEFAULT NULL,
    email_already_sent BOOLEAN DEFAULT FALSE,
    verified_email BOOLEAN DEFAULT FALSE,
    token VARCHAR(46) NOT NULL,
    role ENUM('USER', 'CREATOR', 'ADMIN') NOT NULL DEFAULT 'USER',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE videos (
    id VARCHAR(23) PRIMARY KEY,
    url TEXT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT DEFAULT NULL,
    author_id VARCHAR(23) NOT NULL,
    category_id VARCHAR(23) NOT NULL,
    duration INT,
    views INT,
    type ENUM('VIDEO', 'FAST') NOT NULL,
    thumbnail_url TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

    FOREIGN KEY (author_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE events (
	id INT AUTO_INCREMENT PRIMARY KEY,
	author_id VARCHAR(23) NOT NULL,
	title TEXT NOT NULL,
	description MEDIUMTEXT DEFAULT NULL,
	thumbnail_url TEXT NOT NULL,
	views INT NOT NULL DEFAULT 0,
	event_date DATETIME NOT NULL,

	FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE channels (
	id VARCHAR(23) PRIMARY KEY,
	subscribers int,
	banner_url TEXT DEFAULT NULL,
	social_medias TEXT DEFAULT NULL, -- PADRÃO(CRIADOR): https://instagram.com, https://facebook.com
	user_id VARCHAR(23) NOT NULL,

	FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE categories (
    id VARCHAR(23) PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE users_category (
    id VARCHAR(23) PRIMARY KEY,
    category_id VARCHAR(23) NOT NULL,
    user_id VARCHAR(23) NOT NULL,

    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE comments (
    id VARCHAR(23) PRIMARY KEY,
    content TEXT NOT NULL,
    user_id VARCHAR(23) NOT NULL,
    video_id VARCHAR(23) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

    FOREIGN KEY (video_id) REFERENCES videos(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE videos_avaliations (
    id VARCHAR(23) PRIMARY KEY,
    stars TINYINT(5) NOT NULL,
    user_id varchar(23) NOT NULL,
    video_id varchar(23) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

    FOREIGN KEY (video_id) REFERENCES videos(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE users_history (
    id VARCHAR(23) PRIMARY KEY,
    video_id VARCHAR(23) NOT NULL,
    user_id VARCHAR(23) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

    FOREIGN KEY (video_id) REFERENCES videos(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- T E S T I N G --

INSERT INTO users (
    id,
    email,
    password,
    name,
    username,
    date_birthday,
    token,
    role
) VALUES (
    'usr_001',
    'teste@example.com',
    'senha123', -- Só para teste, em produção use hash!
    'Usuário Teste',
    'usuarioteste',
    '1990-01-01',
    'token12345678901234567890123456789012345612', -- 46 caracteres
    'CREATOR'
);

-- I N D E X E S --

CREATE INDEX get_user_id_email_username
ON users (id, email, username);

CREATE INDEX get_category_id_name
ON categories (id, name);

CREATE INDEX get_video_id_name
ON videos (id);

CREATE INDEX get_users_category_id_category_id_user_id
ON users_category (id, category_id, user_id);

CREATE INDEX get_comments_id_user_id_video_id
ON comments (id, user_id, video_id);

CREATE INDEX get_avaliations_id_user_id_video_id
ON videos_avaliations (id, user_id, video_id);

CREATE INDEX get_users_history_id_user_id_video_id
ON users_history (id, user_id, video_id);