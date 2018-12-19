
<?php
require_once 'helper/helper.php';
start_sess('gossip');

if (isset($_SESSION['user_id'])) {
    header('location: blog.php');
}

$page_title = 'Sign in';
$error = '';

if (isset($_POST['submit'])) {

    if (isset($_POST['token']) && isset($_SESSION['csrf_token']) && $_POST['token'] == $_SESSION['csrf_token']) {
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        if (!$email) {

            $error = ' * A valid email is required';
        } elseif (!$password) {

            $error = '* Password is reuqired';
        } else {

            $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
            mysqli_query($link, "SET NAMES utf8");
            $email = mysqli_real_escape_string($link, $email);
            $password = mysqli_real_escape_string($link, $password);
            $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
            $res = mysqli_query($link, $sql);

            if ($res && mysqli_num_rows($res) == 1) {

                $user = mysqli_fetch_assoc($res);

                if (password_verify($password, $user['password'])) {


                    $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION ['user_id'] = $user['id'];
                    $_SESSION ['user_name'] = $user['name'];
                    header('location: blog.php?sm= ' . $user['name'] . ', Welcome back');
                    exit;
                } else {
                    $error = 'Wrong email and password';
                }
            } else {
                $error = 'Wrong email and password';
            }
        }
    }
    $token = csrf_token();
} else {
    $token = csrf_token();
}
?>

<?php include 'tpl/header.php'; ?>
<main  style="min-height: 550px;">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
                <h1 class="text-center"> -Sign in-  </h1>
            </div>
        </div>
        <div class="row mt-3 d-flex justify-content-center ">
            <div class="col-sm-6 col-md-6">
                <div class="card">
                    <div class="card border border-dark bg-dark text-center">
                        <p class="text-white"><b><i class="fas fa-sign-in-alt text-white"></i><i>Sign in with your account</i></b></p>
                    </div>
                    <div class="card-body border border-dark">
                        <form action="" method="POST" novalidate="novalidate" autocomplete="off">
                            <input type="hidden" name="token" value="<?= $token; ?>">
                            <div class="form-group">
                                <label for="email"><i class="far fa-envelope text-danger pr-2"></i>
                                    <i>Email:</i></label>
                                <input value="<?= old('email'); ?>" type="email" id="email" name="email" class="form-control border border-dark">
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-unlock-alt text-danger pr-2"></i><i>Password:</i></label>
                                <input type="password" id="password" name="password" class="form-control border border-dark">
                            </div>
                            <input type="submit" name="submit" value="Signin"  class=" btn btn-outline-dark btn-block ">
                            <?php if ($error): ?>
                                <div class="alert alert-danger mt-4"><?= $error; ?></div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php include 'tpl/footer.php'; ?>
