<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_221604_events_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('events', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
            'description' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_SMALLINT,
            'author_id' => Schema::TYPE_INTEGER,
            'category_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('index_event_user', 'events', 'author_id', false);
        $this->createIndex('index_event_category', 'events', 'category_id', false);

        $this->addForeignKey("fk_news_event", "news", "event_id", "events", "id", "CASCADE", "RESTRICT");
        $this->addForeignKey("fk_user_event", "events", "author_id", "user", "id", "CASCADE", "RESTRICT");
        $this->addForeignKey("fk_event_participant", "event_participant", "event_id", "events", "id", "CASCADE", "RESTRICT");
        $this->addForeignKey("fk_event_speaker", "event_speaker", "event_id", "events", "id", "CASCADE", "RESTRICT");
        $this->addForeignKey("fk_type_event", "event_type", "event_id", "events", "id", "CASCADE", "RESTRICT");
    }

    public function down()
    {
        $this->dropTable('events');
    }
}
