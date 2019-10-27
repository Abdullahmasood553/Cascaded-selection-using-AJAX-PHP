<?php 

    require_once('dbconnect.php');


    if(isset($_POST['action'])) {
        if($_POST['action'] == "getStudents") {
            $class          = $_POST['class'];
            $section        = $_POST['section'];
            $group          = $_POST['groups'];

            $query = "SELECT * FROM student_profile WHERE class = '".$class."' AND section = '".$section."' AND groups = '".$group."' ";
            
            $data = array();
            $std_all = $conn->query($query);
            if($std_all->num_rows > 0) {
                $all_rows = [];

                while($users = $std_all->fetch_assoc()) {
                    array_push($all_rows, $users);
                }
                $data['status']='1';
                $data['std_list']=$all_rows;

            }else{
                $data['status']='0';
            }
            echo json_encode($data);
            }

        }

?>