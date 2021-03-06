<?php

use Phinx\Migration\AbstractMigration;

class CreateRunnersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('runners');
        $table->addColumn('race', 'string', ['limit' => 10])
              ->addColumn('meal', 'integer')
              ->addColumn('first_name', 'string', ['limit' => 255])
              ->addColumn('last_name', 'string', ['limit' => 255])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('gender', 'boolean')
              ->addColumn('birthday', 'date')
              ->addColumn('city', 'string', ['limit' => 255])
              ->addColumn('country', 'string', ['limit' => 255])
              ->addColumn('team', 'string', ['limit' => 255])
              ->addColumn('paid', 'boolean', ['default' => 0])
              ->addTimestamps()
              ->create();

    }
}
