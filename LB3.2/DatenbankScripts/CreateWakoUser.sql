GRANT USAGE ON *.* TO 'wakoUser'@'localhost' IDENTIFIED BY PASSWORD '*6C3426F691F20A724EFB94ED1D94A62498275F61';

GRANT SELECT, INSERT, UPDATE, CREATE, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON `wako\_neu`.* TO 'wakoUser'@'localhost';