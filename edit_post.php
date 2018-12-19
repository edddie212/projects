<?php
require_once 'helper/helper.php';
start_sess('gossip');


if (!u_verify()) {

    header('location: signin.php');
    exit;
}

$error = '';
$page_title = 'Edit post ';
$uid = $_SESSION['user_id'];
$ptid = trim(filter_input(INPUT_GET, 'ptid', FILTER_SANITIZE_STRING));

if ($ptid && is_numeric($ptid)) {

    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
    mysqli_query($link, "SET NAMES utf8");
    $ptid = mysqli_real_escape_string($link, $ptid);
    $sql = "SELECT * FROM post WHERE id = $ptid AND user_id = $uid ";
    $res = mysqli_query($link, $sql);

    if ($res && mysqli_num_rows($res) == 1) {

        $post = mysqli_fetch_assoc($res);
    }
}

if (empty($post)) {
    header('location: blog.php');
    exit;
}


if (isset($_POST['submit'])) {

    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $article = trim(filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if (!$title || mb_strlen($title) < 2 || mb_strlen($title) > 255) {

        $error = '* Title field is required (min 2 chars, max 255)';
    } elseif (!$article || mb_strlen($article) < 2) {

        $error = '* Article field is required (min 2 chars)';
    } else {

        $title = mysqli_real_escape_string($link, $title);
        $article = mysqli_real_escape_string($link, $article);
        $sql = "UPDATE post set title = '$title', article = '$article', uploaded_at = NOW() WHERE id = $ptid";
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_affected_rows($link) > 0) {

            header('location: blog.php?sm=Your post have been updated');
            exit;
        }
    }
}
?>

<?php include 'tpl/header.php'; ?>
<main style="min-height: 800px;">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1 class="text-center">- Edit post page -</h1>
                <p>
                    <a href="blog.php"><i class="fas fa-arrow-circle-left fa-3x rounded-circle text-dark border border-info"></i></a>
                </p>
            </div>
        </div> <div class="row mt-3">
            <div class="col-sm-12  ">
                <div class="card ">
                    <div class="card-header  border border-dark bg-dark text-white text-center">
                        <i class="far fa-plus-square mr-2"></i> <b><i>  Add your new post</i></b>
                    </div>
                    <div class="card-body  border border-dark">
                        <form action="" method="POST" novalidate="novalidate" autocomplete="off">
                            <div class="form-group">
                                <label for="title"><span class="text-danger "><i class="fas fa-globe-africa"></i></i></span><i> Title:</i></label>
                                <input value="<?= old('title'); ?>" type="text" id="title" name="title" class="form-control  border border-info">
                            </div>
                            <div class="form-group ">
                                <label for="article"><span class="text-danger"><i class="fas fa-globe-africa"></i></span><i> Article:</i></label>
                                <textarea class="form-control  border border-info" name="article" id="article" rows="10"><?= old('article'); ?></textarea>
                            </div>
                            <input type="submit" name="submit" value="Post" class="btn btn-dark btn-block  border border-info">
                            <?php if ($error): ?>
                                <div class="alert alert-danger mt-4"><?= $error; ?></div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php include 'tpl/footer.php'; ?>