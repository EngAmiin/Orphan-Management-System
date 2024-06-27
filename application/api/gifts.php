<?php

include_once ("../config/conn.db.php");


class Admin extends DatabaseConnection
{
    
    public function fetchingOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from tank where id='$id'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }
    public function readGifts($_conn)
    {
        extract($_POST);
        $response = array();
        $data = array();

        $sql = "SELECT * FROM gift";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }

                    $response = array("error" => "", "status" => true, "data" => $data);
                } else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo json_encode($response);
    }
    public function readLevel($_conn)
    {
        extract($_POST);
        $response = array();
        $data = array();

        $sql = "SELECT * FROM level";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }

                    $response = array("error" => "", "status" => true, "data" => $data);
                } else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo json_encode($response);
    }
    public function count($conn)
    {
        extract($_POST);
        $res = array();
        $sql = "SELECT COUNT(*) as counter from $table";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                $res = array("message" => "success", "rowNumber" => $row['counter']);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function createTank($_conn)
    {
        extract($_POST);
        $response = array();
            $sql = "INSERT INTO `tank`(`note`,`quantity`) VALUES ('$note','$quantity');";
            if (!$_conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $_conn->query($sql);
                if ($result) {
                    $response = array("message" => "successfully ragestered...", "status" => true);
                } else {
                    $response = array("error" => $_conn->error, "Status" => false);
                }
            }  
             echo json_encode($response);
    }




     
    
    public function deleteTank($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM `tank` WHERE `id`='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was deleted..", "status" => true);
                else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo json_encode($response);
    }
    public function updateTank($conn)
    {
        extract($_POST);
        $response = array();
        // UPDATE `doctors` SET `dr_id`='[value-1]',`name`='[value-2]',`gender`='[value-3]',`mobile`='[value-4]',`address`='[value-5]',`email`='[value-6]',`password`='[value-7]',`profision_id`='[value-8]',`hospital_id`='[value-9]',`verified`='[value-10]',`description`='[value-11]',`profile_image`='[value-12]' WHERE 1
            $sql = "UPDATE `tank` SET `note`='$note',`quantity`='$quantity' WHERE `id`='$id';";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Tank was updated", "status" => true);
                } else {
                    $response = array("error" => "there is an error connection", "status" => false);
                }
            }
        


        echo json_encode($response);
    }
  
}
$admin = new Admin;
// checking
switch ($_POST['action']) {
    // case "createCitezan":
    //     $admin->createCitezan(Admin::getConnection());
    //     break;
    case "readGifts":
        $admin->readGifts(Admin::getConnection());
        break;
        case "readLevel":
            $admin->readLevel(Admin::getConnection());
            break;
    case "updateTank":
        $admin->updateTank(Admin::getConnection());
        break;
    case "deleteTank":
        $admin->deleteTank(Admin::getConnection());
        break;
    case "createTank":
        $admin->createTank(Admin::getConnection());
        break;
    case "fetchingOne":
        $admin->fetchingOne(Admin::getConnection());
        break;

    default:
        return;
}