<?php 
	/* Template Name: Đăng nhập */  ?>
<?php 
    $userLoggedIn = null;
    if ( isset($_POST['btnLogin']) ) :
        $username = $_POST['txtUserName'];
        $password = $_POST['txtPassword'];
        $userLoggedIn = Membership\Login::perform(['username' => $username, 'password' => $password]);
        if ( $userLoggedIn ) :
            wp_redirect(get_account_page_url());
            exit();
        endif;
    endif; ?>
<?php get_header(); ?>
<div class="wrapper">
    <main id="main">
        <div class="container">
            <div class="breadcrumb">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<div>','</div>' );
                    }
                ?>
            </div>
        </div>
        <section id="login">
                <div class="container">
                    <div class="login__group">
                        <h1 class="title__global-2">
                            Đăng nhập
                        </h1>
                        <?php include(locate_template('/templates/login/socials.php')) ?>
                        <div class="distinction">
                            <span>Hoặc</span>
                        </div>
                        <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
                            <?php include(locate_template('/templates/login/form.php')) ?>
                            <?php include(locate_template('/templates/login/footer.php')) ?>
                        </form>
                    </div>
                </div>
            </section>
    </main>
</div>
<?php get_footer(); ?>