<?php

class userControllerupdatedelete extends Controller {

    public function __construct() {
        parent::__construct();
    }

    function retrievedata() {
        $rows = $this->db->select("* FROM users");

        return $rows;
    }

    function delete($data) {
        $where = array('id' => $data);
        $this->db->delete('user', $where);
    }

    function retrievebyid($id) {
        $rows = $this->db->select("* from user where id =: id ", ['id' => $id]);
        return $rows;
    }

    function update($id, $name) {
        $data = array(
            'id' => $id,
            'name' => $name
        );
        $where = array('id' => $id);
        $this->db->update('users', $data, $where);
    }

}
