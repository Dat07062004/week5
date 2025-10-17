-- Tạo bảng joke_pic
CREATE TABLE IF NOT EXISTS joke (
    id INT AUTO_INCREMENT PRIMARY KEY,
    joketext TEXT NOT NULL,
    jokedate DATE,
    image VARCHAR(255)
);

-- Chèn dữ liệu mẫu
INSERT INTO joke (joketext, jokedate, image) VALUES
('matt joke 1', '2022-10-11', 'doctor.png'),
('another joke, who cares', '2022-10-18', 'knocker.jpg'),
('so funny', '2022-10-24', 'chicken.jpg'),
('matt joke 4', '2022-10-18', 'doctor.png');