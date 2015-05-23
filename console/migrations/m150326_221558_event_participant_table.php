<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_221558_event_participant_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('event_participant', [
            'id' => Schema::TYPE_PK,
            'event_id' => Schema::TYPE_INTEGER,
            'user_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createIndex('index_event_participant', 'event_participant', 'event_id', false);
        $this->createIndex('index_participant_event', 'event_participant', 'user_id', false);
    }

    public function down()
    {
        $this->dropTable('event_participant');
    }
}
