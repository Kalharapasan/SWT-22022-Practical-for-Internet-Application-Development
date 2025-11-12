CREATE TABLE expenses (     
    id INT AUTO_INCREMENT PRIMARY KEY,     
    amount DECIMAL(10, 2) NOT NULL,     
    description TEXT,     
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
); 