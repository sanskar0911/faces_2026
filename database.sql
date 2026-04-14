-- Database for FACES 2026 Sports Festival
CREATE DATABASE IF NOT EXISTS faces_2026;
USE faces_2026;

-- Students / Registrations table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    college_name VARCHAR(150) NOT NULL,
    branch VARCHAR(100) NOT NULL,
    year VARCHAR(20) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    selected_sport VARCHAR(50) NOT NULL,
    emergency_contact VARCHAR(20) NOT NULL,
    payment_status ENUM('Pending', 'Completed') DEFAULT 'Pending',
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Events table
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sport_name VARCHAR(50) NOT NULL,
    description TEXT,
    rules TEXT,
    team_size INT,
    match_format VARCHAR(100),
    prize_pool VARCHAR(100),
    venue VARCHAR(100),
    schedule_time DATETIME
);

-- Announcements table
CREATE TABLE IF NOT EXISTS announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact Form messages
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200),
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed some events
INSERT INTO events (sport_name, description, team_size, venue) VALUES 
('Football', '11-a-side football tournament.', 11, 'Main Ground'),
('Cricket', 'T20 format cricket match.', 11, 'Cricket Ground'),
('Basketball', '5-a-side basketball.', 5, 'Basketball Court'),
('Volleyball', 'Classic volleyball match.', 6, 'Volleyball Court'),
('Badminton', 'Singles and Doubles.', 2, 'Indoor Sports Complex'),
('Table Tennis', 'Singles match.', 1, 'Indoor Sports Complex'),
('Chess', 'Grandmaster level strategy.', 1, 'Library Hall'),
('Athletics', '100m, 200m, 400m races.', 1, 'Track & Field');