<?php

// приложение
class Application
{

    protected $connection;
    protected $record;
    protected $queryBuiler;

    public function __construct(DBFactoryInterface $serviceFactory)
    {
        $this->connection = $serviceFactory->DBConnection();
        $this->record = $serviceFactory->DBRecord();
        $this->queryBuiler = $serviceFactory->DBQueryBuiler();
    }

    public function run()
    {

    }
}

// контракты СУБД
interface ConnectionInterface {}
interface RecordInterface {}
interface QueryBuilerInterface {}

// реализация контрактов СУБД MySQL
class MySQLConnection implements ConnectionInterface {}
class MySQLRecord implements RecordInterface {}
class MySQLQueryBuiler implements QueryBuilerInterface {}

// реализация контрактов СУБД PostgreSQL
class PostgreSQLConnection implements ConnectionInterface {}
class PostgreSQLRecord implements RecordInterface {}
class PostgreSQLQueryBuiler implements QueryBuilerInterface {}

// реализация контрактов СУБД Oracle
class OracleConnection implements ConnectionInterface {}
class OracleRecord implements RecordInterface {}
class OracleQueryBuiler implements QueryBuilerInterface {}

// контракт нашей абстрактной фабрики
interface DBFactoryInterface
{
    public function DBConnection(): ConnectionInterface;    // соединение с базой
    public function DBRecord(): RecordInterface;           // запись таблицы базы данных
    public function DBQueryBuiler(): QueryBuilerInterface;  // конструктор запросов к базе
}

// фабрика MySQL
class MySQLFactory implements DBFactoryInterface
{
    public function DBConnection(): ConnectionInterface
    {
        return new MySQLConnection();
    }

    public function DBRecord(): RecordInterface
    {
        return new MySQLRecord();
    }

    public function DBQueryBuiler(): QueryBuilerInterface
    {
        return new MySQLQueryBuiler();
    }
}


// фабрика Postgre
class PostgreSQLFactory implements DBFactoryInterface
{
    public function DBConnection(): ConnectionInterface
    {
        return new PostgreSQLConnection();
    }

    public function DBRecord(): RecordInterface
    {
        return new PostgreSQLRecord();
    }

    public function DBQueryBuiler(): QueryBuilerInterface
    {
        return new PostgreSQLQueryBuiler();
    }
}

// фабрика Oracle
class OracleFactory implements DBFactoryInterface
{
    public function DBConnection(): ConnectionInterface
    {
        return new OracleConnection();
    }

    public function DBRecord(): RecordInterface
    {
        return new OracleRecord();
    }

    public function DBQueryBuiler(): QueryBuilerInterface
    {
        return new OracleQueryBuiler();
    }
}

// подключаемся к базе данных
// MySQLFactory, PostgreSQLFactory или OracleFactory
$application = new Application(new OracleFactory());
