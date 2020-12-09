<?php
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ //
// ~~~ database class code from https://codeshack.io/ ~~~ //
// ~~~~~~~~~~~~~~~ with some modifications ~~~~~~~~~~~~~~ //
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ //
class Database {
    protected $connection;
	protected $query;
    protected $show_errors = TRUE;
    protected $query_closed = TRUE;
	public $query_count = 0;

	public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = 'root', $dbname = '', $charset = 'utf8') {
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass);
        
		if ($this->connection->connect_error) {
			$this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
		}
        $this->connection->set_charset($charset);

        // If we couldn't create database, then it either doesn't exist or we can't see it
        if (!$this->connection -> select_db($dbname)) {
            // create database
            $this->connection->query("CREATE DATABASE ?", $dbname);
        }
	}

    /**
     * Attempt to execute query $query string.
     *
     * @return Database database object.
     */
    public function query($query) {
        if (!$this->query_closed) {
            $this->query->close();
        }
		if ($this->query = $this->connection->prepare($query)) {
            if (func_num_args() > 1) {
                $x = func_get_args();
                $args = array_slice($x, 1);
				$types = '';
                $args_ref = array();
                foreach ($args as $k => &$arg) {
					if (is_array($args[$k])) {
						foreach ($args[$k] as $j => &$a) {
							$types .= $this->_gettype($args[$k][$j]);
							$args_ref[] = &$a;
						}
					} else {
	                	$types .= $this->_gettype($args[$k]);
	                    $args_ref[] = &$arg;
					}
                }
				array_unshift($args_ref, $types);
                call_user_func_array(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
           	if ($this->query->errno) {
				$this->error('Unable to process MySQL query (check your params) - ' . $this->query->error);
           	}
            $this->query_closed = FALSE;
			$this->query_count++;
        } else {
            $this->error('Unable to prepare MySQL statement (check your syntax) - ' . $this->connection->error);
        }
		return $this;
    }

    /**
     * Fetch multiple records from a SELECT query. You can specify a callback if you do not want the results being stored in an array (useful for large amounts of data).
     * 
     * @return array array of records.
     */
	public function fetchAll($callback = null) {
	    $params = array();
        $row = array();
	    $meta = $this->query->result_metadata();
	    while ($field = $meta->fetch_field()) {
	        $params[] = &$row[$field->name];
	    }
	    call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            if ($callback != null && is_callable($callback)) {
                $value = call_user_func($callback, $r);
                if ($value == 'break') break;
            } else {
                $result[] = $r;
            }
        }
        $this->query->close();
        $this->query_closed = TRUE;
		return $result;
	}


    /**
     * Fetch multiple records from a SELECT query.
     * 
     * @return array array of records.
     */
	public function fetchArray() {
	    $params = array();
        $row = array();
	    $meta = $this->query->result_metadata();
	    while ($field = $meta->fetch_field()) {
	        $params[] = &$row[$field->name];
	    }
	    call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
		while ($this->query->fetch()) {
			foreach ($row as $key => $val) {
				$result[$key] = $val;
			}
		}
        $this->query->close();
        $this->query_closed = TRUE;
		return $result;
	}

    /**
     * Close database connection.
     * 
     * @return bool
     */
	public function close() {
		return $this->connection->close();
	}


    /**
     * Get number of rows from a SELECT query.
     * 
     * @return int
     */
    public function numRows() {
		$this->query->store_result();
		return $this->query->num_rows;
	}

    /**
     * Get number of affected rows from a query.
     * 
     * @return int
     */
	public function affectedRows() {
		return $this->query->affected_rows;
	}

    public function lastInsertID() {
    	return $this->connection->insert_id;
    }


    /**
     * Display error.
     * 
     * @param string $error error string.
     */
    public function error($error) {
        if ($this->show_errors) {
            exit($error);
        }
    }

    /**
     * Get variable type.
     * 
     * @return type type of variable.
     */
	private function _gettype($var) {
	    if (is_string($var)) return 's';
	    if (is_float($var)) return 'd';
	    if (is_int($var)) return 'i';
	    return 'b';
	}
}
?>
