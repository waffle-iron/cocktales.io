<?php

namespace Cocktales\Framework\Database\Migration;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\TableDiff;
use Doctrine\DBAL\Types\Type;

trait AltersTables
{
    /**
     * @var AbstractSchemaManager
     */
    private $schema;

    /**
     * AddRequiresActivationCodeFieldToCampaign constructor
     * @param AbstractSchemaManager $schema
     */
    public function __construct(AbstractSchemaManager $schema)
    {
        $this->schema = $schema;
    }

    /**
     * @param string $column
     * @param string $type
     * @return Column
     * @throws \Doctrine\DBAL\DBALException
     */
    protected function column(string $column, string $type): Column
    {
        return new Column($column, Type::getType($type));
    }

    /**
     * Add multiple columns to a table
     *
     * @param string $table
     * @param Column[] $columns
     * @return void
     */
    protected function addTableColumns(string $table, array $columns)
    {
        $this->schema->alterTable(new TableDiff($table, $columns));
    }

    /**
     * Remove multiple columns from a table
     *
     * @param string $table
     * @param Column[] $columns
     */
    protected function removeTableColumns(string $table, array $columns)
    {
        $this->schema->alterTable(new TableDiff($table, [], [], $columns, [], [], [], $this->schema->listTableDetails($table)));
    }
}