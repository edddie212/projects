
<?php
require_once 'helper/helper.php';
start_sess('gossip');
$page_title = 'Home Page';
?>

<?php include 'tpl/header.php'; ?>

<main role="main" >
    <div class="container marketing">
        <h1 class="display-3 mb-4 mt-3 text-center">Hello and Welcome</h1><br>
        <div class="row ">
            <div class="col-lg-4 col-md-6 mt-3">
                <img class="rounded-circle" src="https://thumbs.dreamstime.com/z/cartoon-gossip-girls-friends-telling-secrets-characters-illustrations-your-design-76368650.jpg" alt="people gossip cartoon" width="140" height="140">
                <h2>Welcome To Gossip</h2>
                <p>Hello and welcome to gossip the most populer gossip blog there is . here you can finally unload all the gossip you have heard over the day and didnt have anyone to share this juicy gossip.
                    Lets set it free.</p>
            </div>
            <div class="col-lg-4 col-md-6 mt-3">
                <img class="rounded-circle" src="https://previews.123rf.com/images/saphatthachat/saphatthachat1601/saphatthachat160100017/50434207-vector-cartoon-character-man-gossip.jpg" alt="people gossip cartoon" width="140" height="140">
                <h2>Everybody gossip</h2>
                <p>Everybody gossip it doesn't matter if it is at work or school or any other place, studies show us the it is even good to our health and living in a less strassfull invourment</p>
            </div>
            <div class="col-lg-4  mt-3">
                <img class="rounded-circle" src="https://365psd.com/images/previews/150/beautiful-gossip-girls-43703.jpg" alt="people gossip cartoon" width="140" height="140">
                <h2>Share with us </h2>
                <p>So dont keep it all to your self come and share that juicy info with us just sign in or  sign up if you dont have a account because the longer you waiting there more you missing.</p>
            </div>
        </div>


        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Even Studies Show <span class="text-muted">That to Gossip is healty</span></h2>
                <p class="lead">Family therapists face a number of challenges in their work. When children are present in family therapy they can and do make fleeting contributions. We draw upon naturally occurring family therapy sessions to explore the pseudo-presence and pseudo-absence  of children and the institutional gossiping  quality these interactions have. Our findings illustrate that a core characteristic of gossiping is its functional role in building alignments which in this institutional
                    context is utilized as a way of managing accountability. Our findings have a number of implications for clinical professionals
                    and highlight the value of discourse and conversation analysis techniques for exploring therapeutic interactions.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="http://vadlo.com/Research_Cartoons/Why-is-he-wearing-a-labcoat-there.gif" alt="doctor and anurse gosiip">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Even at family dinners <span class="text-muted">Make dinners more intersting</span></h2>
                <p class="lead">Despite the fact that historians regularly acknowledge the persistence of oral culture in the early modern world,
                    few studies have actually examined how orality, language, and popular speech functioned on a daily basis.
                    This article considers gossip in sixteenth?century Venice. While prescriptive literature from the period unanimously suggested that women were the main
                    practitioners of the disruptive speech of gossip, a close look at trials from the court of the Holy Office reveal that the gender com?ponent of gossip was inherently unstable.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto mt-4" src="http://community.ew.com/wp-content/uploads/2014/11/family-guy-thanksgiving.jpg" alt="Famliy guy cartoon dinner">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">What are  <span class="text-muted">you waiting for</span></h2>
                <p class="lead">So after all that you read here dont you want to get started already, and start sharing all the gossip in your life with others?
                    lets start.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsiPDT9RH-tH25NnoGhi4QjOL1QbrtD7AtfnfAqnJuggKhBF2x" alt="Man winking">
            </div>
        </div>

        <hr class="featurette-divider">

    </div>
    <div class="row d-flex justify-content-center mb-3">
        <div class="text-center ">
            <a class="btn btn-outline-dark btn-lg    "  href="blog.php">Get Started People</a>
        </div>       
    </div>
</main>
<?php
include 'tpl/footer.php';
?>