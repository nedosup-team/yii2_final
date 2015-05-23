<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_221602_event_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('event_type', [
            'id' => Schema::TYPE_PK,
            'event_id' => Schema::TYPE_INTEGER,
            'type_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createIndex('index_event_type', 'event_type', 'event_id', false);
        $this->createIndex('index_type_event', 'event_type', 'type_id', false);
    }

    public function down()
    {
        $this->dropTable('event_type');
    }
}
