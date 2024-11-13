CREATE USER 'luis'@'localhost' IDENTIFIED BY ' proyecto';

GRANT ALL PRIVILEGES ON  proyecto.* TO ' luis'@'localhost';

FLUSH PRIVILEGES;
