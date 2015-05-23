<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_152210_userinfo extends Migration {
	public function up()
	{
		$this->addColumn('user', 'social_id', Schema::TYPE_STRING);
	}

	public function down()
	{
		$this->dropColumn('user', 'social_id');
	}

}
