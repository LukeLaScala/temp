<?php 
	class point {
		  var $x;
		  var $y;
		  var $ID;

		  function __construct($x, $y, $ID) {
       		$this->x = $x;
       		$this->y = $y;
       		$this->ID = $ID;
     	}

   		public function get_x(){
   			return $this->x;
   		}

   		public function get_y(){
   			return $this->y;
   		}

   		public function get_ID(){
   			return $this->ID;
   		}

   		public function delete(){
        $ID = $this->ID;
        $link = new mysqli('localhost', 'web1', 'web1', 'web1');
        $uid = $_SESSION['user']['uid'];
        mysqli_query($link, "DELETE FROM point where (uid = $uid and (id = $ID))");
   		}
	}
?>