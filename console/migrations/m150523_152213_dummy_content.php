<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_152213_dummy_content extends Migration {
    public function up()
    {
        $this->insert('categories', [
            'id' => 1,
            'title' => " IT конференции",
            'description' => "Конференции связанные с IT",
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('categories', [
            'id' => 2,
            'title' => "Сходка домохозяек",
            'description' => "Всё о доме",
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('events', [
            'id' => 1,
            'title' => "ITconf",
            'content' => "all information about event ",
            'description' => "short information about event",
            'status' => "2",
            'author_id' => "1",
            'category_id' => "1",
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('events', [
            'id' => 2,
            'title' => "Home conf ",
            'content' => "all information about event ",
            'description' => "short information about event",
            'status' => "2",
            'author_id' => "1",
            'category_id' => "2",
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function down()
    {

    }
}
