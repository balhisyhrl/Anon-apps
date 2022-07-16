<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => "Explore Products",
        'description' => $websettings->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => 'source code,bal, appbal, sc, php,nodejs,botwa',
        'url' => base_url('explore'),
        'author' => 'ball'
    ]); ?>
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/app.css" />
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/main.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <style>
        .ttitel {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>
</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>

        <?php require_once(VIEWPATH . "frontend/include/navbar.php") ?>

        <?php require_once(VIEWPATH . "frontend/items/inc/submenu.php") ?>

        <div class="view-wrapper" data-naver-offset="210" data-menu-item="#explore-sidebar-menu" data-mobile-item="#explore-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        <div class="huro-hamburger nav-trigger push-resize" data-sidebar="explore-sidebar">
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
                            <h1 class="title is-4">Products</h1>
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

                    <div class="card-grid-toolbar">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".column">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="<?= base_url("library") ?>" class="button h-button is-primary is-raised">
                                <span class="icon">
                                    <i aria-hidden="true" class="fas fa-folder"></i>
                                </span>
                                <span>My Library</span>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <div class="card-grid card-grid-v2">

                            <!--Card Grid v2-->
                            <div class="columns is-multiline">

                                <?php foreach ($items as $i) : ?>
                                    <div class="column is-4">
                                        <div class="card-grid-item">
                                            <div class="card">
                                                <header class="card-header">
                                                    <div class="card-header-title">
                                                        <div class="h-avatar is-small">
                                                            <a href="<?= base_url("users/$i->username") ?>"><img class="avatar" src="<?= _storage("avatar/$i->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $i->username ?>"></a>
                                                        </div>
                                                        <div class="meta">
                                                            <a href="<?= base_url("users/$i->username") ?>"><span class="dark-inverted"><?= $i->name ?></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-header-icon">
                                                        <?php if ($i->tipe == 'forsale') { ?>
                                                            <span class="tag is-rounded is-blue is-elevated"><?= "Rp. " . format_number($i->price) ?></span>
                                                        <?php } else if ($i->tipe == 'free') { ?>
                                                            <span class="tag is-rounded is-success is-elevated">Free</span>
                                                        <?php } else { ?>
                                                            <span class="tag is-rounded is-purple is-elevated">Member</span>
                                                        <?php } ?>
                                                    </div>
                                                </header>
                                                <div class="card-image">
                                                    <figure class="image is-16by9">
                                                        <a href="<?= base_url("item/$i->seo_url") ?>"><img src="<?= _storage("thumbnails/$i->thumbnail") ?>" alt="<?= $i->title ?>"></a>
                                                    </figure>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-content-flex">
                                                        <div class="card-info">
                                                            <a href="<?= base_url("item/$i->seo_url") ?>">
                                                                <h3 class="dark-inverted ttitel" data-filter-match><?= $i->title ?></h3>
                                                            </a>
                                                            <p data-filter-match><i data-feather="calendar"></i><?= $i->updated_at ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <footer class="card-footer">
                                                    <?php if ($i->tipe == 'forsale') { ?>
                                                        <a href="<?= base_url("payment/$i->id") ?>" class="card-footer-item">BUY</a>
                                                    <?php } else if ($i->tipe == 'free') { ?>
                                                        <a href="<?= base_url("item/$i->seo_url") ?>" class="card-footer-item">DOWNLOAD</a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url("item/$i->seo_url") ?>" class="card-footer-item">GET</a>
                                                    <?php } ?>
                                                    <a href="<?= base_url("item/$i->seo_url") ?>" class="card-footer-item">VIEW</a>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>

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