<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_152212_remove_event_fk extends Migration {
    public function up()
    {
        $this->dropForeignKey("fk_participant_event", "event_participant");
    }

    public function down()
    {
        $this->addForeignKey("fk_participant_event", "event_participant", "user_id", "user", "id", "CASCADE", "RESTRICT");
    }
}
