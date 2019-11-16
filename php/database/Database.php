<?php
class Database
{
    protected $url;
    protected $user;
    protected $pass;
    protected $db;
    protected $connection = null;

    //Constructor voor als object word aangemaakt
    public function __construct($url, $user, $pass, $db)
    {
        $this->url = $url;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    //Deconstructor voor als object word verwijderd
    public function __destruct()
    {
        if ($this->connection != null) {
            $this->closeConnection();
        }
    }

    //Maak een connectie met de Database
    protected function makeConnection()
    {
        $this->connection = new mysqli($this->url, $this->user, $this->pass, $this->db);
        if ($this->connection->connect_error) {
            echo "ERROR ". $this->url . $this->connection->connect_error;
        }
    }

    //Verbreek de connectie met de database
    protected function closeConnection()
    {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection == null;
        }
    }

    //clean parameter om sql injectie te vermijden
    protected function cleanParameter($param)
    {
        $result = $this->connection->real_escape_string($param);
        return $result;
    }

    //voer query uit in DB en voorkom sql injectie
    public function executeQuery($query, $params = null)
    {
        //Connectie maken
        $this->makeConnection();
        //indien er parameters zijn
        if ($params != null) {
            $queryParts = preg_split("/\?/", $query);
            //Fout geven als aantal ? niet overeen komt met aantal params
            if (count($queryParts) != count($params) + 1) {
                return false;
            }
            $finalQuery = $queryParts[0];
            //Loop over de params
            for ($i = 0; $i < count($params); $i++) {
                //Clean de params
                $finalQuery = $finalQuery . $this->cleanParameter($params[$i]) . $queryParts[$i + 1];
            }
            $query = $finalQuery;
        }
        //Query uitvoeren en terug geven
        $results = $this->connection->query($query);
        return $results;
    }
}

?>