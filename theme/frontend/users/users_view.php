<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => $row->name,
        'description' => $row->bio,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage("avatar/$row->avatar"),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url("users/$row->username"),
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
                            <h1 class="title is-4" style="text-transform: capitalize;">My Profile</h1>
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
                        <div class="profile-wrapper">
                            <div class="profile-header has-text-centered">
                                <div class="h-avatar is-xl">
                                    <img class="avatar" src="<?= _storage("avatar/$row->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $row->username ?>">
                                </div>
                                <h3 class="title is-4 is-narrow"><?= $row->name ?></h3>
                                <p class="light-text"><?= $row->bio ?></p>
                                <div class="profile-stats">
                                    <div class="profile-stat">
                                        <i class="lnil lnil-users-alt"></i>
                                        <span><?= $row->username ?></span>
                                    </div>
                                    <div class="separator"></div>
                                    <div class="profile-stat">
                                        <i class="lnil lnil-checkmark-circle"></i>
                                        <span><?= $this->db->get_where('items_owned', ['id_users' => $row->id])->num_rows() ?> Owned</span>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-body">
                                <div class="settings-section" style="display: flex; justify-content: center;">
                                    <a href="<?= base_url("users/$row->username?m=view") ?>" class="settings-box">
                                        <div class="edit-icon">
                                            <i class="lnil lnil-frame-expand"></i>
                                        </div>
                                        <div class="icon-wrap">
                                            <i class="lnil lnil-user-alt-1"></i>
                                        </div>
                                        <span>Profile</span>
                                        <h3>View Profile</h3>
                                    </a>
                                    <a href="<?= base_url('library') ?>" class="settings-box">
                                        <div class="edit-icon">
                                            <i class="lnil lnil-frame-expand"></i>
                                        </div>
                                        <div class="icon-wrap">
                                            <i class="lnil lnil-folder"></i>
                                        </div>
                                        <span>Library</span>
                                        <h3>My Library</h3>
                                    </a>
                                    <a href="<?= base_url('users/settings') ?>" class="settings-box">
                                        <div class="edit-icon">
                                            <i class="lnil lnil-frame-expand"></i>
                                        </div>
                                        <div class="icon-wrap">
                                            <i class="lnil lnil-cog"></i>
                                        </div>
                                        <span>Settings</span>
                                        <h3>Settings Profile</h3>
                                    </a>
                                </div>

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
    </div>
</body>

</html>