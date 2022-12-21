<?php
require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';
//require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

use Core\Db;

class Migration
{
    const SCRIPTS_DIR = __DIR__ . '/scripts/';
    const MIGRATIONS_TABLE = '0_migrations';

    public function __construct()
    {
        try {
            //check migration table & create
            $this->checkMigrationsTable();
            //run all migrations
        } catch (PDOException $exception){
            d($exception->getTrace(),$exception->getMessage());
        }
    }

    protected function checkMigrationsTable()
    {
        $query =Db::connect()->prepare("SHOW TABLES LIKE '" . self::MIGRATIONS_TABLE . "'");
        $query->execute();

        if (!$query->fetch()) {
            $this->createMigrationsTable();
        }
    }

    protected function createMigrationsTable()
    {
        $script = file_get_contents(self::SCRIPTS_DIR . self::MIGRATIONS_TABLE . '.sql');
        $query = Db::connect()->prepare($script);

        if ($query->execute()) {
            d('# Migrations table was created! OK');
        }
    }
}

new Migration();