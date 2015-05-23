<?php

use yii\db\Schema;
use yii\db\Migration;

class m150328_202210_event_location extends Migration {
	public function up()
	{
		$this->addColumn('events', 'lat', Schema::TYPE_STRING);
		$this->addColumn('events', 'lng', Schema::TYPE_STRING);
		$this->addColumn('events', 'address', Schema::TYPE_STRING);
	}

	public function down()
	{
		$this->dropColumn('events', 'lat');
		$this->dropColumn('events', 'lng');
		$this->dropColumn('events', 'address');
	}

}
