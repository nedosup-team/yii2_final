<?php

use yii\db\Schema;
use yii\db\Migration;

class m150328_202211_event_topic_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('event_topic', [
            'id' => Schema::TYPE_PK,
            'event_id' => Schema::TYPE_INTEGER,
            'topic_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createIndex('index_event_topic', 'event_topic', 'event_id', false);
        $this->createIndex('index_topic_event', 'event_topic', 'topic_id', false);

    }

    public function down()
    {
        $this->dropTable('event_topic');
    }
}
