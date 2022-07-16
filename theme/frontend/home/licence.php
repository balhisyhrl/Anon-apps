<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => "LICENCE",
        'description' => $websettings->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url(),
        'author' => 'ball'
    ]); ?>
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/app.css" />
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/main.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>

        <!-- GET MENU -->
        <?php require_once(VIEWPATH . "frontend/include/navbar.php") ?>

        <?php require_once(VIEWPATH . "frontend/home/inc/submenu.php") ?>

        <div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        <div class="huro-hamburger nav-trigger push-resize" data-sidebar="home-sidebar">
                            <span class="menu-toggle has-chevron">
                                <span class="icon-box-toggle">
                                    <span class="rotate">
                                        <i class="icon-line-top"></i>
                                        <i class="icon-line-center"></i>
                                        <i class="icon-line-bottom"></i>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="title-wrap">
                            <h1 class="title is-4">LICENCE</h1>
                        </div>

                        <div class="toolbar ml-auto">

                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>

                            <a class="toolbar-notifications is-hidden-mobile right-panel-trigger" data-panel="notify-panel">
                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <i data-feather="bell"></i>
                                        <span class="new-indicator pulsate"></span>
                                    </div>
                                </div>
                            </a>

                            <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                                <i data-feather="grid"></i>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">
                        <div class="form-layout is-stacked">
                            <div class="form-outer">
                                <?php if (is_login(false)) { ?>
                                    <form action="<?= base_url('licence') ?>" method="post">
                                        <div class="form-header stuck-header">
                                            <div class="form-header-inner">
                                                <div class="left">
                                                    <h3>Licence</h3>
                                                </div>
                                                <div class="right">
                                                    <div class="buttons">
                                                        <a href="<?= base_url() ?>" class="button h-button is-light is-dark-outlined">
                                                            <span class="icon">
                                                                <i class="lnir lnir-arrow-left rem-100"></i>
                                                            </span>
                                                            <span>Cancel</span>
                                                        </a>
                                                        <button type="submit" class="button h-button is-primary is-raised">Claim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-section">
                                                <div class="columns is-multiline">
                                                    <div class="column is-12">
                                                        <div class="field">
                                                            <div class="control has-icon">
                                                                <input type="text" class="input" placeholder="BAL-XXXX-XXXX-XXXX" value="<?= ($this->session->userdata('lcgen')) ? $this->session->userdata('lcgen') : "" ?>" name="licence" autocomplete="off" required>
                                                                <div class="form-icon">
                                                                    <i data-feather="code"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <blockquote class="is-primary">
                                                                <p>Licenses can be obtained from manual purchases through the admin or certain events.</p>
                                                            </blockquote>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div class="form-header stuck-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                <h3>Claim License</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="<?= base_url('auth/register') ?>" class="button h-button is-purple ">
                                                        <span>SIGN UP</span>
                                                    </a>
                                                    <a href="<?= base_url('auth/login') ?>" class="button h-button is-primary is-raised">SIGN IN</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-section">
                                            <div class="columns is-multiline">
                                                <div class="column is-12">
                                                    <div class="content">
                                                        <blockquote class="is-danger">
                                                            <p>Login or register to access this feature.</p>
                                                        </blockquote>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <script src="<?= _frontEnd() ?>js/app.js"></script>
        <script src="<?= _frontEnd() ?>js/functions.js"></script>
        <script src="<?= _frontEnd() ?>js/main.js" async></script>
        <script src="<?= _frontEnd() ?>js/components.js" async></script>
        <script src="<?= _frontEnd() ?>js/popover.js" async></script>
        <script src="<?= _frontEnd() ?>js/widgets.js" async></script>
        <!-- Additional Features -->
        <script src="<?= _frontEnd() ?>js/touch.js" async></script>
        <script src="<?= _frontEnd() ?>js/syntax.js" async></script>
        <script src="<?= _frontEnd() ?>js/bal.js"></script>
        <?php require_once(VIEWPATH . "frontend/include/addons.php") ?>
    </div>
</body>

</html>