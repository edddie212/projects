<?php
require_once 'helper/helper.php';
start_sess('gossip');
$page_title = 'Blog Page';

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
mysqli_query($link, "SET NAMES utf8");
$sql = "SELECT u.name,pimg.file_name,p.*,DATE_FORMAT(p.uploaded_at,'%d/%m/%Y') udate FROM post p "
        . "JOIN users u ON u.id = p.user_id "
        . "JOIN profile_image pimg ON u.id = pimg.user_id "
        . "ORDER BY p.created_at DESC";
$res = mysqli_query($link, $sql);

if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}
?>


<?php include 'tpl/header.php'; ?>

<main style="min-height: 100%;">
    <div class="container">
        <div class="row mt-3  ">

            <div class="col-sm-12 mb-5 text-center  ">
                <div class="col px-0">

                    <h1 class="display-4 font-italic">- Posts - </h1>
                    <h2 class="display-5 font-italic">Here you can read , edit , your posts </h2>
                    <p class="lead my-3"> <i>You can post Multiple posts and read others people
                            <br>gossip as well we can wait for your post and updates
                            what's<br> most interesting in this post's contents.</i></p>
                </div>

            </div>
        </div>
        <?php if (u_verify()): ?>

            <div class=" row">
                <div class="col-sm-10 d-flex justify-content-center">
                    <p class="mt-2">
                        <a href="add_post.php"  class="btn btn-outline-secondary btn-block ml-2">
                            <i class="fas fa-plus "></i>
                            Add your post
                        </a>
                    </p>
                </div>

            </div>

        <?php endif; ?>
        <?php if ($res && mysqli_num_rows($res) > 0): ?>
            <div class="row mt-2 d-flex justify-content-center">
                <?php while ($post = mysqli_fetch_assoc($res)): ?>
                    <div class="col-sm-10 col-md-10 col-lg-10 mb-5 ">
                        <div class="card border border-dark rounded  ">

                            <div class="card-header bg-dark text-white">
                                <img class="rounded-circle border border-white" width="40px" src="image/<?= $post['file_name'] ?>">
                                <span><?= htmlspecialchars($post['name']); ?></span> <span class="float-right"><?= $post['udate']; ?></span>
                            </div>
                            <div class="card-body border border-dark" style="background-color: rgba(240, 253, 255)">
                                <h3><b><?= htmlspecialchars($post['title']); ?></b></h3>

                                <p><?= str_replace("\n", '<br>', htmlspecialchars($post['article'])); ?></p>
                                <?php if (!empty($uid) && $uid == $post['user_id']): ?>
                                    <p class="float-right">
                                        <a href="edit_post.php?ptid=<?= $post['id']; ?>" class="btn btn-outline-dark btn-sm mb-2 mt-3 mr-2 edit-post">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </a>
                                        <a href="delete_post.php?ptid=<?= $post['id']; ?>" class="btn btn-outline-danger btn-sm mb-2 mt-3 ml-2 delete-post ">
                                            <i class="far fa-trash-alt"></i>
                                            Delete
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php include 'tpl/footer.php'; ?>