<?php

use yii\db\Schema;
use yii\db\Migration;

class m150328_202211_topic_speaker_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('topic_speaker', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'topic_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createIndex('index_topic_speaker', 'topic_speaker', 'user_id', false);
        $this->createIndex('index_speaker_topic', 'topic_speaker', 'topic_id', false);

    }

    public function down()
    {
        $this->dropTable('topic_speaker');
    }
}
