<!-- sub menu -->
<div id="api-sidebar" class="sidebar-panel is-generic">
    <div class="subpanel-header">
        <h3 class="no-mb">API</h3>
        <div class="panel-close">
            <i data-feather="x"></i>
        </div>
    </div>
    <div class="inner" data-simplebar>
        <ul>
            <li>
                <a href="<?= base_url('api') ?>">API LIST</a>
            </li>
            <?php foreach ($tag as $t) : ?>
                <li class="has-children">
                    <div class="collapse-wrap">
                        <a href="javascript:void(0);" class="parent-link"><?= $t->title ?> <i data-feather="chevron-right"></i></a>
                    </div>
                    <ul>
                        <?php
                        $query = $this->db->get_where('api_list', ['tag' => $t->id, 'status' => 'active'])->result();
                        foreach ($query as $l) :
                        ?>
                            <li>
                                <a class="is-submenu" href="<?= base_url("api/$l->id") ?>">
                                    <i class="lnil lnil-code"></i>
                                    <span><?= $l->title ?></span>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<div class="mobile-subsidebar">
    <div class="inner">
        <div class="sidebar-title">
            <h3>API</h3>
        </div>

        <ul class="submenu">
            <li>
                <a href="<?= base_url('api') ?>">API LIST</a>
            </li>
            <?php foreach ($tag as $t) : ?>
                <li class="has-children">
                    <div class="collapse-wrap">
                        <a href="javascript:void(0);" class="parent-link"><?= $t->title ?> <i data-feather="chevron-right"></i></a>
                    </div>
                    <ul>
                        <?php
                        $query = $this->db->get_where('api_list', ['tag' => $t->id, 'status' => 'active'])->result();
                        foreach ($query as $l) :
                        ?>
                            <li>
                                <a class="is-submenu" href="<?= base_url("api/$l->id") ?>">
                                    <i class="lnil lnil-code"></i>
                                    <span><?= $l->title ?></span>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
            <?php endforeach ?>
        </ul>

    </div>
</div>
<!-- sub menu -->