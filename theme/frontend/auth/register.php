<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= meta_tag([
        'title' => "SIGN UP - " . $websettings->seo_title,
        'description' => 'START CREATING YOUR ACCOUNT IN BAL APP AND ENJOY THE VARIOUS FEATURES OUR TEAM HAS PROVIDED.',
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url('auth/register'),
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

                <div class="column is-5">
                    <div class="hero is-fullheight is-white">
                        <div class="hero-heading">
                            <label class="dark-mode ml-auto">
                                <input type="checkbox" checked>
                                <span></span>
                            </label>
                            <div class="auth-logo">
                                <a href="<?= base_url() ?>">
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
                                            <h2>Join Us Now.</h2>
                                            <p>Start by creating your account</p>
                                            <a href="<?= base_url("auth/login") ?>">I already have an account </a>
                                        </div>
                                        <div class="auth-form-wrapper">
                                            <!-- Login Form -->
                                            <form method="POST">
                                                <div id="signin-form" class="login-form">
                                                    <!-- Input -->
                                                    <div class="field">
                                                        <div class="control has-icon">
                                                            <input class="input" type="text" placeholder="Full Name" value="<?= $this->session->flashdata("val_name") ?>" name="name" required>
                                                            <span class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="control has-icon">
                                                            <input class="input" type="text" placeholder="Username" name="username" value="<?= $this->session->flashdata("val_username") ?>" required minlength="4">
                                                            <span class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- Input -->
                                                    <div class="field">
                                                        <div class="control has-icon">
                                                            <input class="input" type="email" placeholder="Email Address" name="email" value="<?= $this->session->flashdata("val_email") ?>" required>
                                                            <span class="form-icon">
                                                                <i data-feather="mail"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- Input -->
                                                    <div class="field">
                                                        <div class="control has-icon">
                                                            <input class="input" type="password" placeholder="Password" name="password" required>
                                                            <span class="form-icon">
                                                                <i data-feather="lock"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="setting-item">
                                                        <label class="form-switch is-primary">
                                                            <input type="checkbox" class="is-switch" required checked>
                                                            <i></i>
                                                        </label>
                                                        <div class="setting-meta">
                                                            <span>I agree with the existing regulations.</span>
                                                        </div>
                                                    </div>

                                                    <!-- Submit -->
                                                    <div class="control login">
                                                        <button type="submit" class="button h-button is-primary is-bold is-fullwidth is-raised">Sign Up</button>
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

                <!-- Image section (hidden on mobile) -->
                <div class="column login-column is-7 is-hidden-mobile h-hidden-tablet-p hero-banner">
                    <div class="hero login-hero is-fullheight is-app-grey">
                        <div class="hero-body">
                            <div class="columns">
                                <div class="column is-10 is-offset-1">
                                    <img class="light-image has-light-shadow has-light-border" src="<?= _frontEnd() ?>img/illustrations/apps/huro-banking-light.png" alt="">
                                    <img class="dark-image has-light-shadow" src="<?= _frontEnd() ?>img/illustrations/apps/huro-banking-dark.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="hero-footer">
                            <p class="has-text-centered"></p>
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
    </div>
</body>

</html>