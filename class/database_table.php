

<?php
  
  class Database_Table{
  	public $table;



  	function __construct($table){
		$this->table = $table;	
	}

	function saveData($record, $pk = ''){
		 try{
	        $this->insert($record);
	    }
	    catch(Exception $e){
	        $this->update($record, $pk); 
	    }
	}

   function findAllData() {
	    global $pdo; 
	    $select_query = $pdo->prepare("SELECT * FROM   $this->table "); 
	    $select_query->execute();
	    return $select_query; 
	   }


   function findData($column, $value) {
	    global $pdo; 
	    $select_query = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$column.'=:value'); // query to select all data.

	    $criteria = [
	            'value' => $value
	        ];
	    $select_query->execute($criteria); 
	    return $select_query; 
	   }

   function findSearchData($column, $value) {
	    global $pdo;

	    $select_query = $pdo->prepare("SELECT * FROM $this->table WHERE $column LIKE '$value'"); // query to select all data.
	    $select_query->execute(); 
	    return $select_query;
	   }

   function findUnhiddenData($column, $value,$column1,$value1) {
	    global $pdo; 
	    $select_query = $pdo->prepare("SELECT * FROM $this->table WHERE $column =:value AND $column1 =:value1"); // query to select all data.

	    $criteria = [
	            'value' => $value, 
	            'value1' =>$value1 
	        ];
	    $select_query->execute($criteria); 
	    return $select_query;
	   }

   function findSortedData($column, $value,$column1,$value1,$column2,$value2) {
	    global $pdo; 
	    $select_query = $pdo->prepare("SELECT * FROM $this->table WHERE ($column =:value AND $column1 =:value1) AND $column2=:value2"); // query to select all data.

	    $criteria = [
	            'value' => $value,
	            'value1' =>$value1, 
	            'value2' =>$value2 
	        ];
	    $select_query->execute($criteria);
	    return $select_query; 
	   }


// function to fetch first data from table.
   function findFirstData() {
	    global $pdo; // global variable for database connection.
	    $select_query = $pdo->prepare("SELECT * FROM   $this->table LIMIT 1"); // query to select first data.
	    $select_query->execute(); // executing the query.
	    return $select_query; // returning all value from query.
	   }

// function to fetch first data from table.
   function findLastData() {
	    global $pdo; // global variable for database connection.
	    $select_query = $pdo->prepare("SELECT * FROM   $this->table ORDER BY id DESC LIMIT 1 "); // query to select first data.
	    $select_query->execute(); // executing the query.
	    return $select_query; // returning all value from query.
	   }



	   function insert($record) {
	    global $pdo;  
	    $ar_key = array_keys($record);
	    $data = implode(', ', $ar_key); 
	    $data_with_colon = implode(', :', $ar_key); 
	    $insert_query = 'INSERT INTO '.$this->table.'('.$data.') VALUE(:'.$data_with_colon.')'; 
	    $stmt_run = $pdo->prepare($insert_query);
	    $stmt_run->execute($record); 
	}


	function update($record, $pk) {
	    global $pdo; 
	    $update_value = []; 
	    foreach ($record as $key => $value) { 
	        $update_value[] = $key . '= :'  . $key; 
	      }

	    $valueWithComma = implode(', ', $update_value);

	    $update_query = "UPDATE $this->table SET $valueWithComma WHERE $pk = :pk";

	    $record['pk'] = $record[$pk];
	    // preparing the query.
	    $stmt_run = $pdo->prepare($update_query);

	    $stmt_run->execute($record);
	}

   function deleteData($column,$value) {
	    global $pdo; // global variable for database connection.
	     $select_query = $pdo->prepare("DELETE FROM $this->table WHERE $column =$value");
	    $select_query->execute(); // executing the query.
	    return $select_query; // returning all value from query.
	   }
  }

?>