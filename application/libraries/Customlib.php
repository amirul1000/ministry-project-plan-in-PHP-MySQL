<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Customlib {
	private $CI;

   function __construct() {
       $this->CI =& get_instance();
       $this->CI->load->database();	
   }

 /*
  Get Enum Value
 */
  function getEnumFieldValues($tableName = null, $field = null)
   {
	   
       // Make a DDL query
        $sql = "SHOW COLUMNS FROM $tableName LIKE " . $this->q($field);
        $query = $this->CI->db->query($sql);
		$data = $query->row();
       if(preg_match("('.*')", $data->Type, $match))
       {
          $enumStr       = str_replace("'", '', $match[0]);
          $enumValueList = explode(',', $enumStr);
       }

       return $enumValueList;
   }
   
   function q($str = null)
	   {
		  return "'" . mysqli_escape_string($this->CI->db->conn_id,$str) . "'";
	   }

   function   debug($var)
	 {
       echo "<pre>";
	      print_r($var);
	   echo "</pre>";
     }
	 
   function check_ownership($table_name, $pk_id_value, $ownership_field_name, $ownership_field_value)
    {
        $this->CI->db->where('id', $pk_id_value);
        $this->CI->db->where($ownership_field_name, $ownership_field_value);
        $result = $this->CI->db->get($table_name)->result_array();
        if (! (array) $result) {
            echo "<h3>You are not owner of this item</h3>";
            exit();
        }
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
    }	 
	 
 }
?>