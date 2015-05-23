<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_221600_event_speaker_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('event_speaker', [
            'id' => Schema::TYPE_PK,
            'event_id' => Schema::TYPE_INTEGER,
            'user_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createIndex('index_event_speaker', 'event_speaker', 'event_id', false);
        $this->createIndex('index_speaker_event', 'event_speaker', 'user_id', false);
    }

    public function down()
    {
        $this->dropTable('event_speaker');
    }
}
