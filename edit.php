<?php
    include "conf.php";
    $id = isset($_GET['id']);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        
        $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`Address`='$address',`city`='$city' WHERE `id`=$id";

        $result = mysqli_query($conn , $sql);

        if($result){
            header("Location: index.php?msg=Update record");
        }else{
            echo "failed. " . mysqli_error($conn);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fount Awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CruD Opraction</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573">
        PHP Complite Crud Opractions
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit user</h3>
            <p class="text-muted"> Update info ...</p>
        </div>

        <?php
            include 'conf.php';
            $id = isset($_GET['id']);
            $sql  = "SELECT * from `user` WHERE id = $id";

            $result =  mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-lable">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($row['name'])?>">
                </div>

                <div>
                    <label class="form-lable">email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo isset($row['email'])?>">
                </div>

                <div>
                    <label class="form-lable">Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo isset($row['Address'])?>">
                </div>

                <div>
                    <label class="form-lable">City</label>
                    <input type="text" class="form-control" name="city" value="<?php echo isset($row['city'])?>">
                </div>

                <div>
                    <Button type="submit" name="submit" class="btn btn-success">Submit</Button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Fount Awsome -->
</body>
</html>