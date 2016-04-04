<?php

class Module_Control {
    public function Module_Control() {}

    public function moduleAdd($data) {
        global $db;
        $sql = "INSERT INTO modules(Module_ID, Module_Name, Module_Code, Summary, Description, Act) VALUES(
            NULL,
            '".$data['Module_Name']."',
            '".$data['Module_Code']."',
            '".$data['Summary']."',
            '".$data['Description']."',
            '".$data['Act']."'
        ) ";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function moduleList() {
        global $db;
        $sql = "SELECT * FROM modules ORDER BY Module_ID ASC";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            return $rows;
        } else return false;
    }

    public function moduleLoad($id) {
        global $db;
        $sql = "SELECT * FROM modules WHERE Module_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            return $row;
        } else return false;
    }

    public function moduleDelete($id) {
        global $db;
        $sql = "DELETE FROM modules WHERE Module_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function moduleUpdate($id, $data) {
        global $db;
        $sql = "UPDATE modules SET
            `Module_Name`='".$data['Module_Name']."',
            `Module_Code`='".$data['Module_Code']."',
            `Summary`='".$data['Summary']."',
            `Description`='".$data['Description']."',
            `Act`='".$data['Act']."'
        WHERE Module_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }
}

?>