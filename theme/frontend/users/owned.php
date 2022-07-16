<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => 'My Library',
        'description' => $websettings->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => 'library,appbal',
        'url' => base_url('library'),
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

        <?php require_once(VIEWPATH . "frontend/users/inc/submenu.php") ?>

        <div class="view-wrapper" data-naver-offset="277" data-menu-item="#users-sidebar-menu" data-mobile-item="#users-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        <div class="huro-hamburger nav-trigger push-resize" data-sidebar="users-sidebar">
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
                            <h1 class="title is-4" style="text-transform: capitalize;">MyLibrary</h1>
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

                    <div class="list-view-toolbar">
                        <div class="control has-icon">
                            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".list-view-item">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="<?= base_url("explore") ?>" class="button h-button is-primary is-raised">
                                <span class="icon">
                                    <i aria-hidden="true" class="fas fa-shopping-cart"></i>
                                </span>
                                <span>STORE</span>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <div class="list-view list-view-v2">

                            <div class="list-view-inner">

                                <?php foreach ($items as $itel) :
                                    $v = $this->db->query("SELECT * FROM items_downloads WHERE id_items=$itel->id ORDER BY id DESC")->result()
                                ?>
                                    <div class="list-view-item">
                                        <div class="list-view-item-inner">
                                            <img src="<?= _storage("thumbnails/$itel->thumbnail") ?>" alt="<?= $itel->title ?>">
                                            <div class="meta-left">
                                                <h3>
                                                    <span data-filter-match><?= $itel->title ?></span>
                                                </h3>

                                                <div class="icon-list">
                                                    <span>
                                                        <i class="lnil lnil-cart"></i>
                                                        <span data-filter-match><?= ($itel->payment == 'licence') ? "Licence" : "Midtrans" ?></span>
                                                    </span>
                                                    <span>
                                                        <i class="lnil lnil-calender-alt-3"></i>
                                                        <span data-filter-match><?= $itel->pembelian ?></span>
                                                    </span>
                                                    <span>
                                                        <i class="lnil lnil-code"></i>
                                                        <span data-filter-match><?= $v[0]->version ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="meta-right">
                                                <div class="buttons">
                                                    <a href="<?= base_url("item/$itel->seo_url") ?>" class="button h-button is-light">VIEW DETAIL</a>
                                                    <a href="javascript:void(0)" onclick='getdownload("<?= $itel->id ?>")' class="button h-button is-primary is-raised h-modal-trigger" data-modal="modal-download">DOWNLOAD</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>

                            </div>
                            <nav class="flex-pagination pagination is-rounded" aria-label="pagination" data-filter-hide>
                                <?= $this->pagination->create_links() ?>
                            </nav>
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
        <script src="<?= _frontEnd() ?>js/touch.js" async></script>
        <script src="<?= _frontEnd() ?>js/syntax.js" async></script>
        <script src="<?= _frontEnd() ?>js/bal.js"></script>
        <?php require_once(VIEWPATH . "frontend/include/addons.php") ?>
        <script>
            function getdownload(id) {
                $("#content-modal-download").html('<div class="tile-grid-item"><div class="tile-grid-item-inner placeload-wrap is-flex"><div class="placeload-avatar is-medium is-rounded-full loads"></div><div class="content-shape-group mx-2"><div class="content-shape is-grow-1 mw-80 loads"></div><div class="content-shape mw-60 loads"></div></div></div></div>')
                $("#content-modal-download").load('front/getdownload_owned?id=' + id)
            }
        </script>
        <div id="modal-download" class="modal h-modal">
            <div class="modal-background  h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>DOWNLOAD</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <div class="modal-card-body" id="content-modal-download">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>