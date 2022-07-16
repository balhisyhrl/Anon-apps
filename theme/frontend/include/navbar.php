<nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <!-- Mobile menu toggler icon -->
            <div class="brand-start">
                <div class="navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <a class="navbar-item is-brand" href="index.html">
                <img class="light-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
                <img class="dark-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
            </a>

            <div class="brand-end">
                <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                    <a class="navbar-link is-arrowless right-panel-trigger" data-panel="notify-panel" href="javascript:void(0);">
                        <i data-feather="bell"></i>
                        <span class="new-indicator pulsate"></span>
                    </a>
                </div>
                <!-- Profile -->
                <?php if (is_login(false)) { ?>
                    <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                        <div class="is-trigger" aria-haspopup="true">
                            <div class="profile-avatar">
                                <img class="avatar" src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                            </div>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-head">
                                    <div class="h-avatar is-large">
                                        <img class="avatar" src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                                    </div>
                                    <div class="meta">
                                        <span><?= $us->name ?></span>
                                        <span>@<?= $us->username ?></span>
                                    </div>
                                </div>
                                <a href="<?= base_url("users/$us->username") ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-user-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Profile</span>
                                        <span>View your profile</span>
                                    </div>
                                </a>
                                <?php if ($us->role == 'admin') { ?>
                                    <a href="<?= base_url("admin") ?>" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-layout"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Admin Panel</span>
                                            <span>Admin Dashboards</span>
                                        </div>
                                    </a>
                                <?php } ?>
                                <hr class="dropdown-divider">
                                <a href="<?= base_url("users/settings") ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-cog"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Settings</span>
                                        <span>Account settings</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item is-button">
                                    <a href="<?= base_url("auth/logout") ?>" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                        <div class="is-trigger" aria-haspopup="true">
                            <div class="profile-avatar">
                                <img class="avatar" src="<?= _storage('avatar/default.jpg') ?>" alt="">
                            </div>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-item is-button p-t-15">
                                    <a href="<?= base_url("auth/login") ?>" class="button h-button is-info is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Sign In</span>
                                    </a>
                                    <br>
                                    <a href="<?= base_url("auth/register") ?>" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Sign Up</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>
</nav>
<!--Mobile sidebar-->
<div class="mobile-main-sidebar">
    <div class="inner">
        <ul class="icon-side-menu">
            <li>
                <a href="<?= base_url() ?>" id="home-sidebar-menu-mobile">
                    <i data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="<?= base_url("explore") ?>" id="explore-sidebar-menu-mobile">
                    <i data-feather="grid"></i>
                </a>
            </li>
            <li>
                <a href="<?= base_url('users') ?>" id="users-sidebar-menu-mobile">
                    <i data-feather="users"></i>
                </a>
            </li>
            <li>
                <a href="<?= base_url('api') ?>" id="api-sidebar-menu-mobile">
                    <i data-feather="code"></i>
                </a>
            </li>
        </ul>

        <ul class="bottom-icon-side-menu">
            <li>
                <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                    <i data-feather="search"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i data-feather="settings"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--Circular menu-->
<div id="circular-menu" class="circular-menu">

    <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
        <i aria-hidden="true" class="fas fa-bars"></i>
        <i aria-hidden="true" class="fas fa-times"></i>
    </a>

    <div class="items-wrapper">
        <div class="menu-item is-flex">
            <label class="dark-mode">
                <input type="checkbox" checked>
                <span></span>
            </label>
        </div>

        <a href="javascript:void(0)" class="menu-item is-flex right-panel-trigger" data-panel="notify-panel">
            <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                <div class="is-trigger" aria-haspopup="true">
                    <i data-feather="bell"></i>
                    <span class="new-indicator pulsate"></span>
                </div>
            </div>
        </a>
        <a class="menu-item is-flex right-panel-trigger" data-panel="activity-panel">
            <i data-feather="grid"></i>
        </a>
    </div>

</div>
<!--Sidebar-->
<div class="main-sidebar">
    <div class="sidebar-brand">
        <a href="/">
            <img class="light-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
            <img class="dark-image" src="<?= _storage($websettings->site_logo) ?>" alt="<?= $websettings->seo_title ?>">
        </a>
    </div>
    <div class="sidebar-inner">
        <div class="naver"></div>
        <ul class="icon-menu">
            <li>
                <a href="<?= base_url() ?>" id="home-sidebar-menu" data-content="Home">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li> <!-- Layouts -->
            <li>
                <a href="<?= base_url('explore') ?>" id="layouts-sidebar-menu" data-content="Layouts">
                    <i class="sidebar-svg" data-feather="grid"></i>
                </a>
            </li> <!-- Bounties -->
            <li>
                <a href="<?= base_url('users') ?>" id="users-sidebar-menu" data-content="Users">
                    <i class="sidebar-svg" data-feather="users"></i>
                </a>
            </li>
            <li>
                <a href="<?= base_url('api') ?>" id="api-sidebar-menu" data-content="Api">
                    <i class="sidebar-svg" data-feather="code"></i>
                </a>
            </li>
        </ul>

        <ul class="bottom-menu">
            <li>
                <a href="<?= base_url("users/settings") ?>">
                    <i class="sidebar-svg" data-feather="settings"></i>
                </a>
            </li> <!-- Profile -->
            <li id="user-menu">
                <?php if (is_login(false)) { ?>
                    <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                        <img src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                        <span class="status-indicator"></span>

                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-head">
                                    <div class="h-avatar is-large">
                                        <img class="avatar" src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                                    </div>
                                    <div class="meta">
                                        <span><?= $us->name ?></span>
                                        <span><?= $us->username ?></span>
                                    </div>
                                </div>
                                <a href="<?= base_url("users/$us->username") ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-user-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Profile</span>
                                        <span>View your profile</span>
                                    </div>
                                </a>
                                <a href="<?= base_url("admin") ?>" class="dropdown-item is-media ">
                                    <div class="icon">
                                        <i class="lnil lnil-layout"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Admin Panel</span>
                                        <span>Admin Dashboards</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="<?= base_url("users/settings") ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-cog"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Settings</span>
                                        <span>Account settings</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item is-button">
                                    <a href="<?= base_url('auth/logout') ?>" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                        <img src="<?= _storage('avatar/default.jpg') ?>">
                        <span class="status-indicator"></span>

                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-item is-button p-t-15">
                                    <a href="<?= base_url("auth/login") ?>" class="m-1 button h-button is-info is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Sign In</span>
                                    </a>
                                    <a href="<?= base_url("auth/register") ?>" class="m-1 button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small">
                                            <i data-feather="log-out"></i>
                                        </span>
                                        <span>Sign Up</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </li>

        </ul>
    </div>
</div>
<!--Notify panel-->
<div id="notify-panel" class="right-panel-wrapper is-activity">
    <div class="panel-overlay"></div>

    <div class="right-panel">
        <div class="right-panel-head">
            <h3>Notifications</h3>
            <a class="close-panel">
                <i data-feather="chevron-right"></i>
            </a>
        </div>
        <div class="tabs-wrapper is-triple-slider is-squared">

            <div class="right-panel-body">
                <div class="project-card">
                    <div class="project-inner">
                        <div class="meta">
                            <span>Dari Admin</span>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat necessitatibus neque soluta laborum blanditiis quod eos recusandae sit nihil nostrum accusantium molestiae nesciunt suscipit vero, debitis, officiis dolorem beatae quia.. <br>
                                <small>04-04-2021</small></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>