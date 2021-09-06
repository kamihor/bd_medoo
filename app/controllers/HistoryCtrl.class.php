<?php

namespace app\controllers;
use app\transfer\User;


class HistoryCtrl{
    private $data;
    
    	public function action_history(){
            
                try {
    $database = new \Medoo\Medoo([
        
        'database_type' => 'mysql',
        'database_name' => 'calc_cred',
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_polish_ci',
        'port' => 3306,
        'option' => [
            \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]
    ]);
    
			$this->data=$database->select("wynik", [
                                        "idresult",
					"value",
					"years",
					"percent",
					"result",
                                         "date"
				]);

                                $this->generateView();
    
    
} catch (\PDOException $ex) {
    getMessages()->addError("DB Error: ".$ex->getMessage());
}

		
	}
    
	public function generateView(){
		getSmarty()->assign('page_title','Kalkulator kredytowy');
                getSmarty()->assign('page_description', 'Historia obliczeń');
                
                getSmarty()->assign('data',$this->data);  // lista rekordów z bazy danych
                getSmarty()->assign('user',unserialize($_SESSION['user']));
		getSmarty()->display('HistoryView.tpl');		
	}
}