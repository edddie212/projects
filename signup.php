
<?php
require_once 'helper/helper.php';
start_sess('gossip');

if (isset($_SESSION['user_id'])) {
    header('location: blog.php');
}

$page_title = 'Sign Up';
$error['name'] = $error['email'] = $error['password'] = ' ';

if (isset($_POST['submit'])) {

    if (isset($_POST['token']) && isset($_SESSION['csrf_token']) && $_POST['token'] == $_SESSION['csrf_token']) {
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $cpassword = trim(filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_STRING));
        $form_valid = true;
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
        mysqli_query($link, "SET NAMES utf8");
        $name = mysqli_real_escape_string($link, $name);
        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);


        if (!$name || mb_strlen($name) < 2) {

            $error['name'] = '* Name is reuqired (min 2 chars)';
            $form_valid = false;
        }

        if (!$email) {
            $error['email'] = '* A valid email is required';
            $form_valid = false;
        } elseif (email_set($link, $email)) {
            $error['email'] = '* Email is taken';
            $form_valid = false;
        }

        if (!$password) {
            $error['password'] = '* Password is required';
            $form_valid = false;
        } elseif ($password != $cpassword) {
            $error['password'] = '* Password Confirmation mismatch';
            $form_valid = false;
        }

        if ($form_valid) {

            $file_name = 'default_img.png';

            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {

                $extn = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];
                define('MAX_FILE_SIZE', 1024 * 1024 * 5);

                if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                    if ($_FILES['image']['size'] <= MAX_FILE_SIZE) {

                        $fileinfo = pathinfo($_FILES['image']['name']);

                        if (in_array(strtolower($fileinfo['extension']), $extn)) {

                            $file_name = date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $file_name);
                        }
                    }
                }
            }

            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users VALUES('','$name','$email','$password')";
            $result = mysqli_query($link, $sql);

            if ($result && mysqli_affected_rows($link) > 0) {

                $uid = mysqli_insert_id($link);
                $sql = "INSERT INTO profile_image VALUES('',$uid,'$file_name')";
                $result = mysqli_query($link, $sql);

                if ($result && mysqli_affected_rows($link) > 0) {

                    header('location: signin.php?sm=You\'ve signed up, now you can sign in with your account');
                    exit;
                }
            }
        }
    }

    $token = csrf_token();
} else {

    $token = csrf_token();
}
?>

<?php include 'tpl/header.php'; ?>
<main  style="min-height: 900px;">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
                <h1 class="text-center"> -Sign UP-  </h1>
            </div>
        </div>
        <div class="row mt-3 d-flex justify-content-center ">
            <div class="col-sm-6 col-md-6">
                <div class="card">
                    <div class="card border border-dark bg-dark text-center">
                        <p class="text-white"><b><i class="fas fa-sign-in-alt text-white"></i><i>Sign Up</i></b></p>
                    </div>
                    <div class="card-body border border-dark">
                        <form action="" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="token" value="<?= $token; ?>">
                            <div class="form-group">
                                <label for="name"><i class="far fa-user text-danger pr-2"></i>
                                    <i> Name:</i></label>
                                <input value="<?= old('name'); ?>" type="text" placeholder="Enter name" id="name" name="name" class="form-control border border-dark">
                                <span class="text-danger"><?= $error['name']; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="far fa-envelope text-danger pr-2"></i>
                                    <i>Email:</i></label>
                                <input value="<?= old('email'); ?>" type="email" id="email" placeholder="Enter email" name="email" class="form-control border border-dark">
                                <span class="text-danger"><?= $error['email']; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-unlock-alt text-danger pr-2"></i><i>Password:</i></label>
                                <input type="password" id="password" name="password" placeholder="Enter password" class="form-control border border-dark">
                                <span class="text-danger"><?= $error['password']; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><i class="fas fa-lock text-danger"></i></i><i>Confirm-Password:</i></label>
                                <input type="password" id="password" name="cpassword"  class="form-control border border-dark">

                            </div>

                            <div class="form-group">
                                <label for="image"><i class="fas fa-image pr-2"></i> <i><b>Upload Profile-image</b></i></label>
                                <div class="input-group mb-3 mt-3">
                                    <div class="custom-file">
                                        <input name="image"type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label  class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>

                                </div>

                                <input type="submit" name="submit" value="Signin"  class=" btn btn-outline-dark btn-block ">

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php include 'tpl/footer.php'; ?>
