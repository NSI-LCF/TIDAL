<?php
class User {
    public $id;
    public $username;
    public $type;

    function __construct($id)
    {
        global $dbh;

        // Request to database
        $sth = $dbh->prepare("SELECT username, `type` FROM users WHERE id = ?");
        $sth->execute([$id]);
        $rows = $sth->fetch();

        $this->id = $id;
        $this->username = $rows['username'];
        $this->type = $rows['type'];
    }

    public function get_name() {
        return $this->username;
    }
}