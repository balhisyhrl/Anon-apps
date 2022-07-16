<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= meta_tag([
        'title' => "FORGET - " . $websettings->seo_title,
        'description' => 'Forgot the password on your bal account? use this find your account and send the password reset link via email.',
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url('auth/forgot'),
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
                        <?php if (isset($row)) { ?>
                            <div class="form-card">
                                <form method="POST">
                                    <input type="hidden" name="tipe" value="kirim">
                                    <input type="hidden" name="id_users" value="<?= $row->id ?>">
                                    <div class="login-form" style="text-align: center;">
                                        <div class="h-avatar is-big">
                                            <img class="avatar" src="<?= _storage("avatar/$row->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="" data-user-popover="6">
                                        </div>
                                        <h3 class="dark-inverted" data-filter-match><?= $row->name ?></h3>
                                        <p data-filter-match>@<?= $row->username ?></p>
                                        <br>
                                        <p><small>Is this your account? if yes, continue to send reset password.</small></p>
                                        <div class="control login">
                                            <button type="submit" class="button h-button is-primary is-bold is-fullwidth is-raised">Send Password Reset.</button>
                                        </div>
                                        <div class="forgot-link has-text-centered">
                                            <a href="<?= base_url('auth/forgot') ?>">Not my account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div class="auth-head">
                                <h2>Forgot Password.</h2>
                                <p>Find your account that forgot the password by entering your username or email.</p>
                            </div>

                            <div class="form-card">
                                <form method="POST">
                                    <input type="hidden" name="tipe" value="cari">
                                    <div class="login-form">
                                        <div class="field">
                                            <div class="control has-icon">
                                                <input class="input" type="text" placeholder="Email or Username" name="usermail" required>
                                                <span class="form-icon">
                                                    <i data-feather="code"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="control login">
                                            <button type="submit" class="button h-button is-primary is-bold is-fullwidth is-raised">Search Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
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
        <script src="<?= _frontEnd() ?>js/bal.js"></script>
        <?php require_once(VIEWPATH . "frontend/include/addons.php") ?>
    </div>
</body>

</html>