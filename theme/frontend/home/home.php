<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => "$websettings->seo_title",
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
                            <h1 class="title is-4">Home</h1>
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
                        <?php if (is_login(false)) { ?>
                            <div class="personal-dashboard personal-dashboard-v2">
                                <div class="dashboard-header">
                                    <div class="h-avatar is-xl">
                                        <img class="avatar" src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                                    </div>
                                    <div class="user-meta is-dark-bordered-12">
                                        <h3 class="title is-4 is-narrow is-bold">Welcome back, <?= explode(" ", $us->name)[0] ?>.</h3>
                                        <p class="light-text">It's really nice to see you again</p>
                                    </div>

                                    <div class="cta h-hidden-tablet-p">
                                        <div class="media-flex inverted-text">
                                            <i class="lnil lnil-crown-alt-1"></i>
                                            <p class="white-text">Have a Licensed Product? can be used here.</p>
                                        </div>
                                        <a class="link inverted-text h-modal-trigger" data-modal="modal-license">Claim License</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="lifestyle-dashboard lifestyle-dashboard-v4">
                            <div class="columns">
                                <div class="column is-8">
                                    <div class="columns is-multiline">

                                        <div class="column is-7">

                                            <div class="writing-stats">
                                                <!--Stat-->
                                                <div class="writing-stat">
                                                    <span>Sales</span>
                                                    <span class="dark-inverted"><?= $count_sales ?></span>
                                                </div>
                                                <!--Stat-->
                                                <div class="writing-stat">
                                                    <span>Products</span>
                                                    <span class="dark-inverted"><?= $count_products ?></span>
                                                </div>
                                                <!--Stat-->
                                                <div class="writing-stat">
                                                    <span>Customer</span>
                                                    <span class="dark-inverted"><?= $count_customer ?></span>
                                                </div>
                                            </div>

                                            <div class="featured-authors">
                                                <!--Header-->
                                                <div class="featured-authors-header">
                                                    <h3 class="dark-inverted">New Users List</h3>
                                                    <a class="action-link">View All</a>
                                                </div>

                                                <div class="featured-authors-list">
                                                    <!--Item-->
                                                    <?php foreach ($last_users->result() as $lu) : ?>
                                                        <div class="featured-authors-item">
                                                            <div class="media-flex-center">
                                                                <div class="h-avatar">
                                                                    <img class="avatar is-squared" src="<?= _storage("avatar/$lu->avatar") ?>" alt="<?= $lu->username ?>">
                                                                </div>
                                                                <div class="flex-meta">
                                                                    <span><a href="<?= base_url("users/$lu->username") ?>"><?= $lu->name ?></a></span>
                                                                    <span>@<?= $lu->username ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>

                                        </div>

                                        <!--Content-->
                                        <div class="column is-5">
                                            <!--Updates-->
                                            <div class="updates">
                                                <!--Header-->
                                                <div class="updates-header">
                                                    <h3 class="dark-inverted">Activity</h3>
                                                    <a class="action-link">View All</a>
                                                </div>

                                                <div class="updates-list">
                                                    <?php foreach ($activity as $ac) : ?>
                                                        <div class="update-item is-dark-bordered-12">
                                                            <?php if ($ac->payment == 'licence') {
                                                                echo "<p>$ac->name has claimed the license.</p>";
                                                            } else {
                                                                echo "<p>$ac->name has purchased an item.</p>";
                                                            } ?>
                                                            <span class="dark-inverted"><small><?= $ac->created_at ?></small></span>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4 m-t-10">
                                    <div class="widget text-widget">
                                        <div class="widget-toolbar">
                                            <div class="left">
                                                <h3>Info</h3>
                                            </div>
                                            <div class="right">
                                                <a class="right-icon has-indicator">
                                                    <i data-feather="message-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="widget-content">
                                            <p>If you don't understand how to buy on our platform, you can contact the admin via <span>Whatsapp or Telegram +6285156299020</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div id="modal-license" class="modal h-modal is-small">
            <div class="modal-background h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>License</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <form class="modal-form" method="post" action="<?= base_url('licence') ?>">
                        <div class="modal-card-body">
                            <div class="inner-content">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" name="licence" class="input" placeholder="BAL-XXXX-XXXX-XXXX" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-card-foot is-end">
                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                            <button type="submit" class="button h-button is-success is-raised is-rounded">Claim</button>
                        </div>
                    </form>
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