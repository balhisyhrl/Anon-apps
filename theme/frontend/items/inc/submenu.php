<!-- sub menu -->
<div id="explore-sidebar" class="sidebar-panel is-generic">
    <div class="subpanel-header">
        <h3 class="no-mb">HOME</h3>
        <div class="panel-close">
            <i data-feather="x"></i>
        </div>
    </div>
    <div class="inner" data-simplebar>
        <ul>
            <li>
                <a href="<?= base_url('explore') ?>">Explore Products</a>
            </li>
            <li>
                <a href="<?= base_url('library') ?>">My Library</a>
            </li>
            <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">Tipe Products <i data-feather="chevron-right"></i></a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="<?= base_url('explore?tipe=free') ?>">
                            <i class="lnil lnil-happy-smile"></i>
                            <span>FREE</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="<?= base_url('explore?tipe=member') ?>">
                            <i class="lnil lnil-mastercard"></i>
                            <span>Member</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="<?= base_url('explore?tipe=forsale') ?>">
                            <i class="lnil lnil-sales-report"></i>
                            <span>For Sale</span>
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
            <h3>ITEMS</h3>
        </div>

        <ul class="submenu">
            <li>
                <a href="<?= base_url('explore') ?>">Explore Products</a>
            </li>
            <li>
                <a href="<?= base_url('library') ?>">My Library</a>
            </li>
            <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">Tipe Products <i data-feather="chevron-right"></i></a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="<?= base_url('explore?tipe=free') ?>">
                            <i class="lnil lnil-happy-smile"></i>
                            <span>FREE</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="<?= base_url('explore?tipe=member') ?>">
                            <i class="lnil lnil-mastercard"></i>
                            <span>Member</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="<?= base_url('explore?tipe=forsale') ?>">
                            <i class="lnil lnil-sales-report"></i>
                            <span>For Sale</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>
<!-- sub menu -->