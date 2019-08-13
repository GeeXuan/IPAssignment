<?php

class userController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    function retrievedata() {
        $rows = $this->db->select("* FROM users");

        return $rows;
    }

}
