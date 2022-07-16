<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= meta_tag([
        'title' => "EXPIRED - " . $websettings->seo_title,
        'description' => '',
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url('auth/expired'),
        'author' => 'ball'
    ]); ?>
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/app.css">
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">

            <div class="auth-wrapper-inner is-single">

                <div class="auth-nav">
                    <div class="left"></div>
                    <div class="center">
                        <a href="/" class="header-item">
                            <img class="light-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
                            <img class="dark-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
                        </a>
                    </div>
                    <div class="right">
                        <label class="dark-mode ml-auto">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                </div>

                <div class="single-form-wrap">
                    <div class="inner-wrap">


                        <div class="form-card">
                            <div class="auth-head">
                                <h2>EXPIRED TOKEN.</h2>
                                <p>your token may have expired.</p>
                            </div>
                        </div>
                        <div class="forgot-link has-text-centered">
                            <a href="<?= base_url('auth/login') ?>">Login Account?</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <script src="<?= _frontEnd() ?>js/app.js"></script>
        <script src="<?= _frontEnd() ?>js/functions.js"></script>
        <script src="<?= _frontEnd() ?>js/auth.js"></script>
        <script src="<?= _frontEnd() ?>js/BAL.js"></script>
        <?php require_once(VIEWPATH . "frontend/include/addons.php") ?>
    </div>
</body>

</html>