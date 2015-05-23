<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_152211_participant_event_fk extends Migration {
	public function up()
	{
        $this->addForeignKey("fk_participant_event", "event_participant", "user_id", "user", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
        $this->dropForeignKey("fk_participant_event", "event_participant");
	}

}
