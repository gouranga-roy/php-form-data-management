<?php

    if( file_exists(__DIR__. '/autoload.php')) {
        require_once __DIR__. '/autoload.php';
    }


    // Form data submit
    if( $_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Get value data with form

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $gender = $_POST['gender'] ?? '' ;

        // Form Validation
        if( empty($name) || empty($email) || empty($phone) || empty($country) || empty($gender)) {
            $msg = createAlert("All filed required");
        } else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $msg = createAlert("Invalid Email Address", "warning");
        } else {
            $msg = createAlert("Data Stable", "success");
            reset_form();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="form-area nt-5">
        <div class="container mt-5">
            <div class="col-lg-4 offset-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Create an account</h2>
                    </div>
                    <div class="card-body">
                        <?php echo $msg ?? '';?>
                        <form action="" method="POST">
                            <label for="name">Your Name:</label>
                            <input type="text" name="name" id="name" value="<?php echo oldValue('name');?>" class="form-control mb-2">
                            <?php echo checkRequired('name');?>
                            <label for="email">Your Email:</label>
                            <input type="email" name="email" id="email" value="<?php echo oldValue('email');?>" class="form-control mb-2">
                            <?php echo checkRequired('email');?>
                            <label for="phone">Phone:</label>
                            <input type="tel" name="phone" id="phone" value="<?php echo oldValue('phone');?>" class="form-control mb-2">
                            <?php echo checkRequired('phone');?>
                            <label for="country">Country</label>
                            <select name="country" id="country" class="form-control mb-2">
                                <option value="">-Select-</option>
                                <option value="Bangladesh" <?php echo oldValue('country') == "Bangladesh" ? 'selected' : '';?>>Bangladesh</option>
                                <option value="India" <?php echo oldValue('country') == "India" ? 'selected' : '';?>>India</option>
                                <option value="Canada" <?php echo oldValue('country') == "Canada" ? 'selected' : '';?>>Canada</option>
                                <option value="Jarmani" <?php echo oldValue('country') == "Jarmani" ? 'selected' : '';?>>Jarmani</option>
                                <option value="Usa" <?php echo oldValue('country') == "Usa" ? 'selected' : '';?>>Usa</option>
                                <option value="Paksthan" <?php echo oldValue('country') == "Paksthan" ? 'selected' : '';?>>Paksthan</option>
                            </select>
                            <?php echo checkRequired('country');?>
                            <label>Gender</label><br>
                            <label>Male:  <input type="radio" value="Male" name="gender" id="gender" <?php echo oldValue('gender') == "Male" ? 'checked' : '';?>></label>
                            <label>Femail:  <input type="radio" value="Femail" name="gender" id="gender" <?php echo oldValue('gender') == "Femail" ? 'checked' : '';?>></label>
                            <?php echo checkRequired('name');?>
                            <br>
                            <input type="submit" value="Create" class="btn btn-primary mt-2" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>