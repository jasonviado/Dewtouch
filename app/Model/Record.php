<?php
	class Record extends AppModel{

		public $name = "Record";

		public $hasMany = array('RecordItem');
	}