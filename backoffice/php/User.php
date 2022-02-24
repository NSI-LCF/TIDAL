<?php
class User {
    public $id;
    public $username;
    public $type;
    public $error = null;

    public function get($username, $password) {
        global $dbh;

        if (!empty(trim($username)) || !empty(trim($password))) {
            $query = $dbh->prepare("SELECT id, `password` FROM users WHERE username = ?");
            $query->execute([trim($username)]);
            $userdata = $query->fetch();
        
            if ($userdata) {
                if (trim($userdata["password"]) == hash("sha256", trim($password))) {
                    return $this->load($userdata["id"]);
                } else {
                    $this->error = "Error logging.";
                }
            } else {
                $this->error = "User not found";
            }
          } else {
            $this->error = "Something wasn't filled.";
        }

        return $this;
    }

    function load($id) {
        global $dbh;

        // Request to database
        $sth = $dbh->prepare("SELECT username, `type` FROM users WHERE id = ?");
        $sth->execute([$id]);
        $rows = $sth->fetch();

        $this->id = $id;
        $this->username = $rows['username'];
        $this->type = $rows['type'];
        $this->login_time = time();

        return $this;
    }

    public function get_name() {
        return $this->username;
    }
}