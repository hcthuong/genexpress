<?php

class Information {

    function Information(){}

    public function informationAddCategory($data) {
        global $db;
        $sql = "INSERT INTO information_category VALUES(NULL, '".$data['Name']."', '".$data['Name_EN']."', ".$data['ParentID'].")";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function informationUpdateCategory($id, $data) {
        global $db;
        $sql = "UPDATE information_category SET Name='".$data['Name']."', Name_EN='".$data['Name_EN']."', ParentID=".$data['ParentID']." WHERE InCat_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function informationDeleteCategory($id) {
        global $db;
        $sql = "DELETE FROM information_category WHERE InCat_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function getAllInformationCategory() {
        global $db;
        $sql = "SELECT * FROM information_category WHERE ParentID=0 ORDER BY Name ASC";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            return $rows;
        } else return false;
    }

    public function getAllInformationCategoryExceptOne($id) {
        global $db;
        $sql = "SELECT * FROM information_category WHERE ParentID=0 AND InCat_ID !=$id ORDER BY Name ASC";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            return $rows;
        } else return false;
    }

    public function getAllChildInformationCategory($id) {
        global $db;
        $sql = "SELECT * FROM information_category WHERE ParentID=".$id." ORDER BY Name ASC";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            return $rows;
        } else return false;
    }

    public function getInformationCategory($id) {
        global $db;
        $sql = "SELECT * FROM information_category WHERE InCat_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            return $row;
        } else return false;
    }

    public function informationAdd($data) {
        global $db;
        $sql = "INSERT INTO information VALUES(
            NULL,
            ".$data['InCat_ID'].",
            '".$data['Title']."',
            '".$data['Title_EN']."',
            '".$data['Summary']."',
            '".$data['Summary_EN']."',
            '".$data['Description']."',
            '".$data['Description_EN']."',
            '".$data['Image']."',
            '".$data['Source']."',
            '".$data['Created']."',
            '".$data['Created']."'
        )";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function informationUpdate($id, $data) {
        global $db;
        $sql = "UPDATE information SET
            `Information_CatID`=".$data['InCat_ID'].",
            `Title`='".$data['Title']."',
            `Title_EN`='".$data['Title_EN']."',
            `Summary`='".$data['Summary']."',
            `Summary_EN`='".$data['Summary_EN']."',
            `Description`='".$data['Description']."',
            `Description_EN`='".$data['Description_EN']."',
            `Image`='".$data['Image']."',
            `Source`='".$data['Source']."',
            `Updated`='".$data['Updated']."'
        WHERE Information_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function getInformationList() {
        global $db;
        $sql = "SELECT * FROM information ORDER BY Information_ID DESC";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            return $rows;
        } else return false;
    }

    public function getImageName($id) {
        global $db;
        $sql = "SELECT Image FROM information WHERE Information_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            return $row[0];
        } else return false;
    }

    public function getInformationDetail($id) {
        global $db;
        $sql = "SELECT * FROM information WHERE Information_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            return $row;
        } else return false;
    }

    public function getInformationDetail2($id) {
        global $db;
        $sql = "SELECT *, Title".SUFFIX." as Title FROM information WHERE Information_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            return $row;
        } else return false;
    }

    public function informationDelete($id) {
        global $db;
        $sql = "DELETE FROM information WHERE Information_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            return true;
        } else return false;
    }

    public function getOneInformationLastestInCat($cid) {
        global $db, $function;
        $sql = "SELECT Information_ID, Title".SUFFIX." as Title, Summary".SUFFIX." as Summary, Description".SUFFIX." as Description,
            Source".SUFFIX." as Source, Image FROM information WHERE Information_CatID=$cid ORDER BY Information_ID DESC LIMIT 1";
        //echo $sql;exit;
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            $row['Title_r'] = $function->to_character($row['Title']);
            return $row;
        } else return false;
    }

    public function getAllInformationInCat($id, $page, $perpage) {
        global $db, $function;
        $sql = "SELECT Information_ID, Title".SUFFIX." as Title, Summary".SUFFIX." as Summary, Description".SUFFIX." as Description,
            Source".SUFFIX." as Source, Image FROM information WHERE Information_CatID=$id OR Information_CatID IN (SELECT InCat_ID FROM information_category WHERE ParentID=$id) ORDER BY Information_ID DESC LIMIT $page, $perpage";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            for($i=0; $i < count($rows); $i++) {
                $rows[$i]['Title_r'] = $function->to_character($rows[$i]['Title']);
            }
            return $rows;
        } else return false;
    }

    public function getNumsOfInformationInCat($id) {
        global $db;
        $sql = "SELECT Information_ID FROM information WHERE Information_CatID=$id OR Information_CatID IN (SELECT InCat_ID FROM information_category WHERE ParentID=$id)";
        $res = $db->db_query($sql);
        $nums = $db->db_numrows($res);
        return $nums;
    }

    public function getNumberInformationInSameCat($cid, $id, $num) {
        global $db, $function;
        $sql = "SELECT * FROM information WHERE Information_CatID=$cid AND Information_ID NOT IN($id) ORDER BY Information_ID DESC LIMIT $num";
        $res = $db->db_query($sql);
        if($res) {
            $rows = $db->db_fetchrowset($res);
            for($i=0; $i < count($rows); $i++) {
                $rows[$i]['Title_r'] = $function->to_character($rows[$i]['Title']);
            }
            return $rows;
        } else return false;
    }

    public function getInformationCatName($id) {
        global $db;
        $sql = "SELECT InCat_ID, Name".SUFFIX." as Name, ParentID FROM information_category WHERE InCat_ID=$id";
        $res = $db->db_query($sql);
        if($res) {
            $row = $db->db_fetchrow($res);
            $row['Parent_Name'] = "";
            $row['Parent_ID'] = 0;
            if($row['ParentID'] != 0) {
                $sql2 = "SELECT InCat_ID, Name".SUFFIX." as Name, ParentID FROM information_category WHERE InCat_ID=".$row['ParentID'];
                $res2 = $db->db_query($sql2);
                if($res2) {
                    $row2 = $db->db_fetchrow($res2);
                    $row['Parent_ID'] = $row2['InCat_ID'];
                    $row['Parent_Name'] = $row2['Name'];
                }
            }
            return $row;
        } else return false;
    }

}

?>