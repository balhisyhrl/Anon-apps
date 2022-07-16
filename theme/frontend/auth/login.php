<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= meta_tag([
        'title' => "LOGIN - " . $websettings->seo_title,
        'description' => 'LOG IN TO THE bal APP PLATFORM TO ENJOY MORE FEATURES.',
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url('auth/login'),
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

            <div class="auth-wrapper-inner columns is-gapless">

                <!-- Image section (hidden on mobile) -->
                <div class="column login-column is-8 h-hidden-mobile h-hidden-tablet-p hero-banner">
                    <div class="hero login-hero is-fullheight is-app-grey">
                        <div class="hero-body">
                            <div class="columns">
                                <div class="column is-10 is-offset-1">
                                    <img class="light-image has-light-shadow has-light-border" src="" alt="">
                                    <img class="dark-image has-light-shadow" src="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="hero-footer">
                            <p class="has-text-centered"></p>
                        </div>
                    </div>
                </div>

                <!-- Form section -->
                <div class="column is-4">
                    <div class="hero is-fullheight is-white">
                        <div class="hero-heading">
                            <label class="dark-mode ml-auto">
                                <input type="checkbox" checked>
                                <span></span>
                            </label>
                            <div class="auth-logo">
                                <a href="/">
                                    <img class="top-logo light-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
                                    <img class="top-logo dark-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
                                </a>
                            </div>
                        </div>
                        <div class="hero-body">
                            <div class="container">
                                <div class="columns">
                                    <div class="column is-12">
                                        <div class="auth-content">
                                            <h2>Welcome.</h2>
                                            <p>Please sign in to your account</p>
                                            <a href="<?= base_url('auth/register') ?>">I do not have an account yet </a>
                                        </div>
                                        <div class="auth-form-wrapper">
                                            <form id="form-login">
                                                <div id="signin-form" class="login-form">
                                                    <div class="field">
                                                        <div class="control has-icon">
                                                            <input class="input" type="text" name="username" placeholder="Email or Username" required autocomplete="off">
                                                            <span class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control has-icon">
                                                            <input class="input" type="password" name="password" placeholder="Password" required>
                                                            <span class="form-icon">
                                                                <i data-feather="lock"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="setting-item">
                                                        <label class="form-switch is-primary">
                                                            <input type="checkbox" name="remember" checked class="is-switch">
                                                            <i></i>
                                                        </label>
                                                        <div class="setting-meta">
                                                            <span>Remember Me</span>
                                                        </div>
                                                    </div>

                                                    <!-- Submit -->
                                                    <div class="control login" id="btnl">
                                                        <button class="button h-button is-primary is-bold is-fullwidth is-raised">Sign In</button>
                                                    </div>

                                                    <div class="">
                                                        <a href="<?= base_url("auth/forgot") ?>">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="<?= _frontEnd() ?>js/app.js"></script>
        <script src="<?= _frontEnd() ?>js/functions.js"></script>
        <script src="<?= _frontEnd() ?>js/auth.js"></script>
        <script src="<?= _frontEnd() ?>js/bal.js"></script>
        <?php require_once(VIEWPATH . "frontend/include/addons.php") ?>
        <?php
        if ($this->session->userdata('lcgen')) {
            $redi = base_url("c/" . md5($this->session->userdata('lcgen')));
        } else {
            $redi =  base_url();
        }
        ?>
        <script>
            $(document).ready(function() {
                $("#form-login").submit(function(e) {
                    $("#btnl").html('<button class="button h-button is-primary is-loading is-fullwidth is-raised" disabled>Loading..</button>');
                    e.preventDefault();
                    $.ajax({
                        url: '<?= base_url("auth/login") ?>',
                        type: 'post',
                        data: $(this).serialize(),
                        success: function(data) {
                            if (data == 'berhasil') {
                                toastbal.success("Successfully logged in, wait a moment you will be redirected!")
                                window.location = "<?= $redi ?>";
                            } else {
                                document.getElementById("form-login").reset();
                                toastbal.error(data)
                            }
                            $("#btnl").html('<button class="button h-button is-primary is-bold is-fullwidth is-raised">Sign In</button>');
                        }
                    });
                });
            })
        </script>
    </div>
</body>

</html>