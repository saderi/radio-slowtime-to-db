<?php

$DB = new DB();

class DB 
{
	
	protected $DB_HOST;
	protected $DB_USER;
    protected $DB_PASS;
    protected $DB_NAME;
	protected $connection;

    /**
     * Constructor
     * Set up mysql list.
     *
     * @param string DB_HOST MySQL hostname
     * @param string DB_NAME The name of the database
     * @param string DB_USER MySQL database username
     * @param string DB_PASS MySQL database password
     */
    function __construct() {
        $this->DB_HOST = DB_HOST;
        $this->DB_USER = DB_USER;
        $this->DB_PASS = DB_PASS;
        $this->DB_NAME = DB_NAME;
    }

    /**
     *
     * @return $connection object
     *
     */
    function connection()
    {
        $connection = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
        // Check connection
        if ($connection->connect_error) {
            return false;
        }
        return $connection;
    }

    /**
     *
     * @param string $query The query.
     *
     * @return $connection results of $query.
     *
     */
    function get_results($query)
    {
        $connection = $this->connection();
        return $connection->query($query);
    }

    /**
     *
     * @param string $query The query.
     *
     * @return $connection get one row $query.
     *
     */
    function get_row($query)
    {
        $connection = $this->connection();
        $result = $connection->query($query);
        return mysqli_fetch_row($result);
    }

}
