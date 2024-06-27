<?php

include_once ("../config/conn.db.php");


class Admin extends DatabaseConnection
{
    public function createChildren($_conn)
    {
        extract($_POST);
        $response = array();

        $fileName = $_FILES['profile_image']['name'];
        $ext = explode(".", $fileName)[1];
        $temp = $_FILES['profile_image']['tmp_name'];
        $newName = rand() . "." . $ext;
        $uploadedPath = "../uploads/" . $newName;
        if (move_uploaded_file($temp, $uploadedPath)) {
            // $sql = "INSERT INTO `citizen` (`name`, `tell`, `image`,`password`, `email`,`home_number`,`add_no`,village`)VALUES('$username','$tell','$newName', '$password','$email','$h_number','$add_no','$village');";
            $sql = "INSERT INTO `children`(`cname`, `cdob`, `cyoe`, `cclass`, `cstory`, `cphoto`) VALUES ('$name','$dob','$enroll','$class','$story','$newName');";
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
        }




        echo json_encode($response);
    }
    public function fetchingOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT * from children where cid='$id'";
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
    public function Readchildren($_conn)
    {
        extract($_POST);
        $response = array();
        $data = array();

        $sql = "SELECT * FROM children";
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
    // public function addLevel($_conn)
    // {
    //     $response = array();

    //     // Extract the level value and note from the POST request
    //     if (isset($_POST['level']) && isset($_POST['note'])) {
    //         $new_value = (int)$_POST['level'];
    //         $note = $_POST['note'];
    //     } else {
    //         $response = array("error" => "Level value or note not provided", "status" => false);
    //         echo json_encode($response);
    //         return;
    //     }

    //     if (!$_conn) {
    //         $response = array("error" => "There is an error connection ", "status" => false);
    //     } else {
    //         try {
    //             // Calculate the current total level
    //             $sql = "SELECT COALESCE(SUM(level_quantity), 0) AS total_level FROM level_controller";
    //             $result = $_conn->query($sql);
    //             if ($result) {
    //                 $row = $result->fetch_assoc();
    //                 $current_level = (int)$row['total_level'];

    //                 // Calculate new total level
    //                 $new_total = $current_level + $new_value;

    //                 // Check if the new total exceeds 30,000
    //                 if ($new_total <= 30000) {
    //                     // Insert the new value into level_tracking
    //                     $stmt = $_conn->prepare("INSERT INTO level_controller (level_quantity) VALUES (?)");
    //                     $stmt->bind_param("i", $new_total);
    //                     $stmt->execute();
    //                     if ($stmt->affected_rows > 0) {
    //                         // Insert the note and quantity into the tank table
    //                         $stmt_tank = $_conn->prepare("INSERT INTO tank (note, quantity) VALUES (?, ?)");
    //                         $stmt_tank->bind_param("si", $note, $new_value);
    //                         $stmt_tank->execute();
    //                         if ($stmt_tank->affected_rows > 0) {
    //                             $response = array("error" => "", "status" => true, "message" => "Level and note added successfully");
    //                         } else {
    //                             $response = array("error" => "Failed to add note to tank table", "status" => false);
    //                         }
    //                         $stmt_tank->close();
    //                     } else {
    //                         $response = array("error" => "Failed to add level", "status" => false);
    //                     }
    //                     $stmt->close();
    //                 } else {
    //                     $response = array("error" => "Adding this value would exceed the limit of 30,000", "status" => false);
    //                 }
    //             } else {
    //                 $response = array("error" => "Error fetching current level", "status" => false);
    //             }
    //         } catch (Exception $e) {
    //             $response = array(
    //                 "error" => "There was an error while executing..",
    //                 "message" => $e->getMessage(),
    //                 "status" => false
    //             );
    //         }
    //     }

    //     echo json_encode($response);
    // }

    public function addLevel($_conn)
    {
        $response = array();

        // Extract the level value and note from the POST request
        if (isset($_POST['level']) && isset($_POST['note'])) {
            $new_value = (int) $_POST['level'];
            $note = $_POST['note'];
        } else {
            $response = array("error" => "Level value or note not provided", "status" => false);
            echo json_encode($response);
            return;
        }

        if (!$_conn) {
            $response = array("error" => "There is an error connection", "status" => false);
            echo json_encode($response);
            return;
        }

        try {
            // Calculate the current total level
            $sql = "SELECT COALESCE(SUM(level_quantity), 0) AS total_level FROM level_controller";
            $result = $_conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                $current_level = (int) $row['total_level'];

                // Calculate new total level
                $new_total = $current_level + $new_value;

                // Check if the new total exceeds 30,000
                if ($new_total <= 30000) {
                    // Update the total level in level_controller
                    $stmt = $_conn->prepare("UPDATE level_controller SET level_quantity = ?");
                    $stmt->bind_param("i", $new_total);
                    $stmt->execute();
                    if ($stmt->affected_rows > 0) {
                        // Insert the note and quantity into the tank table
                        $stmt_tank = $_conn->prepare("INSERT INTO tank (note, quantity) VALUES (?, ?)");
                        $stmt_tank->bind_param("si", $note, $new_value);
                        $stmt_tank->execute();
                        if ($stmt_tank->affected_rows > 0) {
                            $response = array("error" => "", "status" => true, "message" => "Level and note added successfully");
                        } else {
                            $response = array("error" => "Failed to add note to tank table", "status" => false);
                        }
                        $stmt_tank->close();
                    } else {
                        $response = array("error" => "Failed to update level", "status" => false);
                    }
                    $stmt->close();
                } else {
                    $response = array("error" => "Adding this value would exceed the limit of 30,000", "status" => false);
                }
            } else {
                $response = array("error" => "Error fetching current level", "status" => false);
            }
        } catch (Exception $e) {
            $response = array(
                "error" => "There was an error while executing..",
                "message" => $e->getMessage(),
                "status" => false
            );
        }

        echo json_encode($response);
    }
    public function updatechildren($conn)
    {
        extract($_POST);
        $response = array();
        // UPDATE `doctors` SET `dr_id`='[value-1]',`name`='[value-2]',`gender`='[value-3]',`mobile`='[value-4]',`address`='[value-5]',`email`='[value-6]',`password`='[value-7]',`profision_id`='[value-8]',`hospital_id`='[value-9]',`verified`='[value-10]',`description`='[value-11]',`profile_image`='[value-12]' WHERE 1
        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $ext = explode(".", $fileName)[1];
            $temp = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $ext;
            $uploadedPath = "../uploads/" . $newName;
            if (move_uploaded_file($temp, $uploadedPath)) {
                $sql = "UPDATE `children` SET `cname`='$name',`cdob`='$dob',`cyoe`='$enroll',`cclass`='$class',`cstory`='$story',`cphoto`='$newName' WHERE `cid`='$id';";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "Doctor was updated", "status" => true);
                    } else {
                        $response = array("error" => "there is an error connection", "status" => false);
                    }
                }
            }
        } else {
            $sql = "UPDATE `children` SET `cname`='$name',`cdob`='$dob',`cyoe`='$enroll',`cclass`='$class',`cstory`='$story' WHERE `cid`='$id';";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor was updated", "status" => true);
                } else {
                    $response = array("error" => "there is an error connection", "status" => false);
                }
            }
        }


        echo json_encode($response);
    }
    public function deletechildren($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM `children` WHERE `cid`='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "child was deleted..", "status" => true);
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


}
$admin = new Admin;
// checking
switch ($_POST['action']) {
    // case "createCitezan":
    //     $admin->createCitezan(Admin::getConnection());
    //     break;
    case "Readchildren":
        $admin->Readchildren(Admin::getConnection());
        break;
    case "fetchingOne":
        $admin->fetchingOne(Admin::getConnection());
        break;
    case "deletechildren":
        $admin->deletechildren(Admin::getConnection());
        break;
    case "updatechildren":
        $admin->updatechildren(Admin::getConnection());
        break;
    case "createChildren":
        $admin->createChildren(Admin::getConnection());
        break;
    default:
        return;
}