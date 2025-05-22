-- database dengan nama 'anime'
CREATE DATABASE anime;
USE anime;

-- tabel penonton
CREATE TABLE penonton (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telepon VARCHAR(20)
);

-- tabel anime
CREATE TABLE anime (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_anime VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    tahun_rilis INT,
    status ENUM('Tamat', 'Ongoing') NOT NULL
);

-- tabel ulasan
CREATE TABLE ulasan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_penonton INT NOT NULL,
    id_anime INT NOT NULL,
    komentar VARCHAR(100),
    rating INT CHECK (rating >= 1 AND rating <= 5),
    FOREIGN KEY (id_penonton) REFERENCES penonton(id),
    FOREIGN KEY (id_anime) REFERENCES anime(id)
);

-- data dummy untuk tabel penonton
INSERT INTO penonton (nama, email, telepon) VALUES
('Revita', 'revita@gmail.com', '081234567890'),
('Alvinza', 'alvinza.pratama@gmail.com', '082112233445'),
('Fathan', 'fathan@gmail.com', '089876543210'),
('Futih', 'futih@gmail.com', '085612345678'),
('Jason', 'jason@gmail.com', '087765432109');

-- data dummy untuk tabel anime
INSERT INTO anime (nama_anime, genre, tahun_rilis, status) VALUES
('Dragon Ball', 'Action', 1986, 'Tamat'),
('One Piece', 'Adventure', 1999, 'Ongoing'),
('Naruto', 'Action', 2002, 'Tamat'),
('Bleach', 'Action', 2004, 'Tamat'),
('Demon Slayer', 'Fantasy', 2019, 'Ongoing'),
('Jujutsu Kaisen', 'Supernatural', 2020, 'Ongoing'),
('Hunter x Hunter', 'Adventure', 1999, 'Ongoing'),
('Haikyuu!!', 'Sports', 2014, 'Tamat'),
('Black Clover', 'Fantasy', 2017, 'Ongoing'),
('Solo Leveling', 'Action', 2024, 'Ongoing'),
('Spy x Family', 'Comedy', 2022, 'Ongoing'),
('Attack on Titan', 'Action', 2013, 'Tamat'),
('Gintama', 'Comedy', 2006, 'Tamat'),
('One Punch Man', 'Action', 2015, 'Ongoing'),
('Death Note', 'Thriller', 2006, 'Tamat');

-- data dummy untuk tabel ulasan
INSERT INTO ulasan (id_penonton, id_anime, komentar, rating) VALUES
(1, 2, 'Seru banget, petualangannya ga habis-habis!', 5),                    
(2, 3, 'Nostalgia masa kecil, Naruto tetap di hati.', 5),        
(2, 14, 'Lucu banget, tapi OP parah sih 😂', 4),                  
(3, 12, 'Ceritanya dalam dan emosional, luar biasa.', 5),                          
(4, 11, 'Lucu dan wholesome banget! Anya imut!', 5),                    
(4, 8, 'Semangat tim Karasuno! Bikin pengen main voli!', 5),      
(5, 10, 'Solo Leveling hype banget, animasinya gila!', 5);       
