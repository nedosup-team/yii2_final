<?php

use yii\db\Schema;
use yii\db\Migration;

class m150328_202212_topics_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('topics', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'speaker_id' => Schema::TYPE_INTEGER,
            'event_time' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey("fk_topic_event", "event_topic", "event_id", "events", "id", "CASCADE", "RESTRICT");
        $this->addForeignKey("fk_topic_speaker", "topic_speaker", "speaker_id", "user", "id", "CASCADE", "RESTRICT");
    }

    public function down()
    {
        $this->dropTable('topics');
    }
}
