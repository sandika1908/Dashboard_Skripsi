<?php

    include 'connect.php';
    session_start();

    if(isset($_POST['execute'])){
        if($_POST['execute'] == "add"){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $query = "INSERT INTO access (username, password, role) VALUES ('$username', '$password', '$role')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                // $_SESSION['eksekusi'] = "Data berhasil ditambahkan!";
                // echo "<script>alert('Maaf data terlambat datang, akan d!');window.location='monitor.php'</script>";
                // echo '<script>alert("Data berhasil ditambahkan!"); location.href="monitor.php";</script>';
                header("location: userlists.php");
            } else {
                echo $query;
            }
            
        } else if($_POST['execute'] == "edit"){
            
            $id_access = $_POST['id_access'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $query = "UPDATE access SET username='$username', password='$password', role='$role' WHERE id_access='$id_access';";
            $sql = mysqli_query($conn, $query);
        }

        if($sql){
            header("location: userlists.php");
        } else {
            echo $query;
        }
    }

    if(isset($_GET['delete'])){
        $id_access = $_GET['delete'];
        $query = "DELETE FROM access WHERE id_access = '$id_access'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: userlists.php");
        }
        
    }

?>