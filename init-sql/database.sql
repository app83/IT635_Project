CREATE DATABASE meds;
USE meds;
CREATE TABLE med_info (
    id INTEGER,
    name VARCHAR(255),
    abbrev VARCHAR(255),
    quantity INTEGER,
    PRIMARY KEY (id)
);
INSERT INTO med_info (id, name, abbrev, quantity) 
VALUES
    (0, "Acetaminophen", "Tylenol", 200),
    (1, "Ibuprofen", "Advil", 250),
    (2, "Tenormin", "Atenolol", 100),
    (3, "Folate", "Folic Acid", 50),
    (4, "Naproxen", "Aleve", 150);

ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'it635';
CREATE USER 'ami'@'%' IDENTIFIED BY 'it635';
GRANT SELECT ON meds.med_info TO 'ami'@'%';
GRANT INSERT ON meds.med_info TO 'ami'@'%';

