PRAGMA busy_timeout = 5000;
PRAGMA writable_schema = 1;
UPDATE sqlite_master SET sql = 'SELECT 1' where name = 'sqlite_stat1';
PRAGMA writable_schema = 0;
VACUUM;

