<?php
namespace Aura\Sql\Adapter;

/**
 * Test class for Mysql.
 * Generated by PHPUnit on 2011-06-21 at 16:49:57.
 */
class PgsqlTest extends AbstractAdapterTest
{
    protected $extension = 'pdo_pgsql';
    
    protected $adapter_type = 'pgsql';    
    
    protected $create_table = "CREATE TABLE aura_test_table (
         id                     SERIAL PRIMARY KEY
        ,name                   VARCHAR(50) NOT NULL
        ,test_size_scale        NUMERIC(7,3)
        ,test_default_null      CHAR(3) DEFAULT NULL
        ,test_default_string    VARCHAR(7) DEFAULT 'string'
        ,test_default_number    NUMERIC(5) DEFAULT 12345
        ,test_default_ignore    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    protected $expect_fetch_table_list = [
        'aura_test_schema1.aura_test_table',
        'aura_test_schema2.aura_test_table'
    ];
    
    protected $expect_fetch_table_list_schema = ['aura_test_table'];
    
    protected $expect_fetch_table_cols = [
        'id' => [
            'name' => 'id',
            'type' => 'integer',
            'size' => null,
            'scale' => null,
            'default' => null,
            'notnull' => true,
            'primary' => true,
            'autoinc' => true,
        ],
        'name' => [
            'name' => 'name',
            'type' => 'character varying',
            'size' => 50,
            'scale' => null,
            'default' => null,
            'notnull' => true,
            'primary' => false,
            'autoinc' => false,
        ],
        'test_size_scale' => [
            'name' => 'test_size_scale',
            'type' => 'numeric',
            'size' => 7,
            'scale' => 3,
            'default' => null,
            'notnull' => false,
            'primary' => false,
            'autoinc' => false,
        ],
        'test_default_null' => [
            'name' => 'test_default_null',
            'type' => 'character',
            'size' => 3,
            'scale' => null,
            'default' => null,
            'notnull' => false,
            'primary' => false,
            'autoinc' => false,
        ],
        'test_default_string' => [
            'name' => 'test_default_string',
            'type' => 'character varying',
            'size' => 7,
            'scale' => null,
            'default' => 'string',
            'notnull' => false,
            'primary' => false,
            'autoinc' => false,
        ],
        'test_default_number' => [
            'name' => 'test_default_number',
            'type' => 'numeric',
            'size' => 5,
            'scale' => null,
            'default' => '12345',
            'notnull' => false,
            'primary' => false,
            'autoinc' => false,
        ],
        'test_default_ignore' => [
            'name' => 'test_default_ignore',
            'type' => 'timestamp without time zone',
            'size' => null,
            'scale' => null,
            'default' => null,
            'notnull' => false,
            'primary' => false,
            'autoinc' => false,
        ],
    ];
    
    protected $expect_quote_scalar = "'\"foo\" bar ''baz'''";
    
    protected $expect_quote_array = "'\"foo\"', 'bar', '''baz'''";
    
    protected $expect_quote_into = "foo = '''bar'''";
    
    protected $expect_quote_into_many = "foo = '''bar''' AND zim = '''baz'''";
    
    protected $expect_quote_multi = "id = 1 AND foo = 'bar' AND zim IN('dib', 'gir', 'baz')";
    
    protected $expect_quote_name_table_as_alias = '"table" AS "alias"';
    
    protected $expect_quote_name_table_col_as_alias = '"table"."col" AS "alias"';
    
    protected $expect_quote_name_table_alias = '"table" "alias"';
    
    protected $expect_quote_name_table_col_alias = '"table"."col" "alias"';
    
    protected $expect_quote_name_plain = '"table"';
    
    protected $expect_quote_names_in = '*, *.*, "foo"."bar", CONCAT(\'foo.bar\', "baz.dib") AS "zim"';
    
    protected function createSchemas()
    {
        $this->adapter->query("CREATE SCHEMA aura_test_schema1");
        $this->adapter->query("CREATE SCHEMA aura_test_schema2");
        $this->adapter->query("SET search_path TO aura_test_schema1");
    }
    
    protected function dropSchemas()
    {
        $this->adapter->query("DROP SCHEMA IF EXISTS aura_test_schema1 CASCADE");
        $this->adapter->query("DROP SCHEMA IF EXISTS aura_test_schema2 CASCADE");
    }
    
    protected function fetchLastInsertId()
    {
        return $this->adapter->lastInsertId($this->table, 'id');
    }
}
