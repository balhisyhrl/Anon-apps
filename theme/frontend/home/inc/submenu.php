<!-- sub menu -->
<div id="home-sidebar" class="sidebar-panel is-generic">
    <div class="subpanel-header">
        <h3 class="no-mb">HOME</h3>
        <div class="panel-close">
            <i data-feather="x"></i>
        </div>
    </div>
    <div class="inner" data-simplebar>
        <ul>
            <li>
                <a href="//balhis.codes">Website Official</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?= base_url('library') ?>">My Items (Login)</a>
            </li>
            <li>
                <a href="<?= base_url('explore') ?>">Explore Products</a>
            </li>
            <li>
                <a href="<?= base_url('licence') ?>">Licence</a>
            </li>
            <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">Users bal <i data-feather="chevron-right"></i></a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="<?= base_url('users') ?>">
                            <i class="lnil lnil-users"></i>
                            <span>Explore Users</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="<?= base_url('customer') ?>">
                            <i class="lnil lnil-users-alt"></i>
                            <span>Customer</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="mobile-subsidebar">
    <div class="inner">
        <div class="sidebar-title">
            <h3>HOME</h3>
        </div>

        <ul class="submenu">
            <li>
                <a href="//balhis.codes">Website Official</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?= base_url('library') ?>">My Items (Login)</a>
            </li>
            <li>
                <a href="<?= base_url('explore') ?>">Explore Products</a>
            </li>
            <li>
                <a href="<?= base_url('licence') ?>">Licence</a>
            </li>
            <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">Users bal <i data-feather="chevron-right"></i></a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="<?= base_url('users') ?>">
                            <i class="lnil lnil-users"></i>
                            <span>Explore Users</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="<?= base_url('customer') ?>">
                            <i class="lnil lnil-users-alt"></i>
                            <span>Customer</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>
<!-- sub menu -->