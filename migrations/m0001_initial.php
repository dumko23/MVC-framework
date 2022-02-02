<?php


use App\core\Application;

class m0001_initial {
    public function up()
    {
         $db = Application::$app->db;
    }

    public function down()
    {
        echo "Down migration";
    }
}