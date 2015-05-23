<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_221601_event_sponsor_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('event_sponsor', [
            'id' => Schema::TYPE_PK,
            'event_id' => Schema::TYPE_INTEGER,
            'user_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createIndex('index_event_sponsor', 'event_sponsor', 'event_id', false);
        $this->createIndex('index_sponsor_event', 'event_sponsor', 'user_id', false);
    }

    public function down()
    {
        $this->dropTable('event_sponsor');
    }
}
