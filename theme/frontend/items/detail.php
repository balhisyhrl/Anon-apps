<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => $title,
        'description' => $row->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage("thumbnails/" . $row->thumbnail),
        'keywords' => $row->seo_keywords,
        'url' => base_url('item/' . $row->seo_url),
        'author' => 'ball'
    ]); ?>
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/app.css" />
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/main.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <style>
        strong {
            color: unset;
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
            <div class="lifestyle-dashboard-bg"></div>
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
                            <h1 class="title is-4">ITEM</h1>
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
                        <div class="lifestyle-dashboard lifestyle-dashboard-v1">
                            <div class="dashboard-header-wrapper">
                                <div class="dashboard-header">
                                    <div class="column is-4">
                                        <div class="card h-card">
                                            <div class="card-image">
                                                <figure class="image is-3by3">
                                                    <img src="<?= _storage("thumbnails/$row->thumbnail") ?>" alt="<?= $row->title ?>">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-meta p-t-10">
                                        <div class="username-wrap">
                                            <div class="username">
                                                <h3><span><?= $row->title ?></span></h3>
                                            </div>
                                        </div>
                                        <div class="meta-stats">
                                            <div class="meta-stat">
                                                <span>1247</span>
                                                <span>View</span>
                                            </div>
                                            <div class="meta-stat">
                                                <span><?= format_number($owned->num_rows()) ?></span>
                                                <span>Sales</span>
                                            </div>
                                            <div class="meta-stat">
                                                <span><?php
                                                        if ($version->num_rows() != 0) {
                                                            $version = $version->result();
                                                            echo $version[0]->version;
                                                        } else {
                                                            echo "0";
                                                        }
                                                        ?></span>
                                                <span>Latest Version</span>
                                            </div>
                                        </div>
                                        <div class="badges">
                                            <?php
                                            $variable = 'value1, value2, value3';
                                            $colors = array("is-purple", "is-success", "is-primary", "is-info");
                                            $arrs = explode(',', $variable);
                                            foreach (explode(",", $row->tags) as $t) :
                                                $random_color = $colors[array_rand($colors)];
                                                $tag = $this->db->get_where('items_tags', ['slug' => $t]);
                                                if ($tag->num_rows() == 1) {
                                                    $tag = $tag->row();
                                            ?>
                                                    <a href="<?= base_url("explore?tag=$tag->slug") ?>" class="tag is-rounded <?= $random_color ?> is-elevated" style="text-decoration: none;"><i class="fas fa-tag"></i> <?= $tag->title ?></a>

                                            <?php }
                                            endforeach ?>
                                        </div>
                                        <div class="meta-achievements">
                                            <div class="meta-achievement is-danger" data-toggle="popover" data-pop-mode="hover" data-pop-width="220" data-pop-title="On Fire" data-pop-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit." data-pop-position="top" data-pop-icon="fas fa-fire" data-pop-iconbg="red">
                                                <i aria-hidden="true" class="fas fa-fire"></i>
                                            </div>
                                            <div class="meta-achievement is-primary" data-toggle="popover" data-pop-mode="hover" data-pop-width="220" data-pop-title="Post Veteran" data-pop-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit." data-pop-position="top" data-pop-icon="fas fa-medal" data-pop-iconbg="primary">
                                                <i aria-hidden="true" class="fas fa-medal"></i>
                                            </div>
                                            <div class="meta-achievement is-yellow" data-toggle="popover" data-pop-mode="hover" data-pop-width="220" data-pop-title="Social Champion" data-pop-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit." data-pop-position="top" data-pop-icon="fas fa-trophy" data-pop-iconbg="yellow">
                                                <i aria-hidden="true" class="fas fa-trophy"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tabs-wrapper">
                                <div class="tabs-inner">
                                    <div class="tabs">
                                        <ul>
                                            <li data-tab="overview-tab" class="is-active"><a>Overview</a></li>
                                            <li data-tab="guide-tab"><a>Documentation (Guide)</a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div id="overview-tab" class="tab-content is-active">
                                    <div class="body-title">
                                        <h3>Overview</h3>
                                    </div>
                                    <div class="columns">
                                        <div class="column is-8">
                                            <div class="r-card is-raised demo-r-card m-b-10 h-hidden-tablet-l h-hidden-desktop">
                                                <?php if ($row->tipe == 'forsale') { ?>
                                                    <h3 class="title is-4" style="text-align: center;"><?= "Rp. " . format_number($row->price) ?></h3>
                                                <?php } else if ($row->tipe == 'free') { ?>
                                                    <h3 class="title is-4" style="text-align: center;">FREE</h3>
                                                <?php } else { ?>
                                                    <h3 class="title is-4" style="text-align: center;">Member</h3>
                                                <?php } ?>
                                                <div class="content p-t-15">
                                                    <?php if ($row->tipe == 'forsale') { ?>
                                                        <?php if (is_owned($row->id)) { ?>
                                                            <blockquote class="is-success">
                                                                <p>You already have this item, check your library to download it.</p>
                                                            </blockquote>
                                                            <a href="<?= base_url("library") ?>" class="button h-button is-info is-fullwidth is-rounded is-elevated m-b-10">
                                                                <span class="icon">
                                                                    <i class="fas fa-folder"></i>
                                                                </span>
                                                                <span>My Library</span>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url("payment/$row->id") ?>" class="button h-button is-success is-fullwidth is-rounded is-elevated m-b-10">
                                                                <span class="icon">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </span>
                                                                <span>BUY</span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } else if ($row->tipe == 'free') { ?>
                                                        <a href="javascript:void(0)" class="button h-button is-info is-fullwidth is-rounded is-elevated m-b-10 h-modal-trigger" data-modal="modal-download">
                                                            <span class="icon">
                                                                <i class="fas fa-download"></i>
                                                            </span>
                                                            <span>DOWNLOAD</span>
                                                        </a>
                                                    <?php } else { ?>
                                                        <?php if (is_member()) { ?>
                                                            <blockquote class="is-success">
                                                                <p>You have special rights to download this item.</p>
                                                            </blockquote>
                                                            <a href="javascript:void(0)" class="button h-button is-info is-fullwidth is-rounded is-elevated m-b-10 h-modal-trigger" data-modal="modal-member">
                                                                <span class="icon">
                                                                    <i class="fas fa-download"></i>
                                                                </span>
                                                                <span>DOWNLOAD</span>
                                                            </a>
                                                        <?php } else { ?>
                                                            <blockquote class="is-danger">
                                                                <p>This item is available via subscriptions only.</p>
                                                            </blockquote>
                                                            <a href="<?= base_url("subscribe") ?>" class="button h-button is-danger is-fullwidth is-rounded is-elevated m-b-10">
                                                                <span class="icon">
                                                                    <i class="fas fa-box"></i>
                                                                </span>
                                                                <span>SUBSCRIBE</span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($row->btn_detail != '') { ?>
                                                        <a href="<?= $row->btn_detail ?>" target="_blank" class="button h-button is-primary is-fullwidth is-rounded is-elevated">
                                                            <span class="icon">
                                                                <i class="fas fa-signature"></i>
                                                            </span>
                                                            <span>DEMO</span>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="r-card is-raised demo-r-card">
                                                <h3 class="title is-5">Description</h3>
                                                <div class="content">
                                                    <?= $row->description ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-4">
                                            <div class="r-card is-raised demo-r-card h-hidden-mobile m-b-10">
                                                <?php if ($row->tipe == 'forsale') { ?>
                                                    <h3 class="title is-4" style="text-align: center;"><?= "Rp. " . format_number($row->price) ?></h3>
                                                <?php } else if ($row->tipe == 'free') { ?>
                                                    <h3 class="title is-4" style="text-align: center;">FREE</h3>
                                                <?php } else { ?>
                                                    <h3 class="title is-4" style="text-align: center;">Member</h3>
                                                <?php } ?>
                                                <div class="content p-t-15">
                                                    <?php if ($row->tipe == 'forsale') { ?>
                                                        <?php if (is_owned($row->id)) { ?>
                                                            <blockquote class="is-success">
                                                                <p>You already have this item, check your library to download it.</p>
                                                            </blockquote>
                                                            <a href="<?= base_url("library") ?>" class="button h-button is-info is-fullwidth is-rounded is-elevated m-b-10">
                                                                <span class="icon">
                                                                    <i class="fas fa-folder"></i>
                                                                </span>
                                                                <span>My Library</span>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url("payment/$row->id") ?>" class="button h-button is-success is-fullwidth is-rounded is-elevated m-b-10">
                                                                <span class="icon">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </span>
                                                                <span>BUY</span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } else if ($row->tipe == 'free') { ?>
                                                        <a href="javascript:void(0)" class="button h-button is-info is-fullwidth is-rounded is-elevated m-b-10 h-modal-trigger" data-modal="modal-download">
                                                            <span class="icon">
                                                                <i class="fas fa-download"></i>
                                                            </span>
                                                            <span>DOWNLOAD</span>
                                                        </a>
                                                    <?php } else { ?>
                                                        <?php if (is_member()) { ?>
                                                            <blockquote class="is-success">
                                                                <p>You have special rights to download this item.</p>
                                                            </blockquote>
                                                            <a href="javascript:void(0)" class="button h-button is-info is-fullwidth is-rounded is-elevated m-b-10 h-modal-trigger" data-modal="modal-member">
                                                                <span class="icon">
                                                                    <i class="fas fa-download"></i>
                                                                </span>
                                                                <span>DOWNLOAD</span>
                                                            </a>
                                                        <?php } else { ?>
                                                            <blockquote class="is-danger">
                                                                <p>This item is available via subscriptions only.</p>
                                                            </blockquote>
                                                            <a href="<?= base_url("subscribe") ?>" class="button h-button is-danger is-fullwidth is-rounded is-elevated m-b-10">
                                                                <span class="icon">
                                                                    <i class="fas fa-box"></i>
                                                                </span>
                                                                <span>SUBSCRIBE</span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($row->btn_detail != '') { ?>
                                                        <a href="<?= $row->btn_detail ?>" target="_blank" class="button h-button is-primary is-fullwidth is-rounded is-elevated">
                                                            <span class="icon">
                                                                <i class="fas fa-signature"></i>
                                                            </span>
                                                            <span>DEMO</span>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="widget social-buttons-widget">
                                                <div class="social-buttons">
                                                    <div class="social-button">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(base_url("item/$row->seo_url")) ?>" target="_blank" class="inner-button is-rounded is-invision">
                                                            <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </div>
                                                    <div class="social-button">
                                                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode(base_url("item/$row->seo_url")) ?>" target="_blank" class="inner-button is-rounded is-github">
                                                            <i aria-hidden="true" class="fab fa-twitter"></i>
                                                        </a>
                                                    </div>
                                                    <div class="social-button">
                                                        <a href="whatsapp://send?text=<?= urlencode(base_url("item/$row->seo_url")) ?>" data-action="share/whatsapp/share" target="_blank" class="inner-button is-rounded is-atlassian">
                                                            <i aria-hidden="true" class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </div>
                                                    <div class="social-button">
                                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(base_url("item/$row->seo_url")) ?>" target="_blank" class="inner-button is-rounded is-bootstrap">
                                                            <i aria-hidden="true" class="fab fa-linkedin"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="guide-tab" class="tab-content">
                                    <div class="r-card is-raised demo-r-card">
                                        <h3 class="title is-5">Documentation</h3>
                                        <div class="content">
                                            <p><?= $row->docs ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <?php if ($row->tipe == 'free') { ?>
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
                        <div class="modal-card-body">
                            <?php
                            if (is_login(false)) {
                                foreach ($version as $v) {
                            ?>
                                    <a href="<?= base_url("download/$v->id") ?>" class="button h-button is-info is-rounded is-elevated is-fullwidth m-b-10">
                                        <span class="icon">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span><?= $v->title ?></span>
                                    </a>
                                <?php }
                            } else { ?>
                                <div class="content">
                                    <blockquote class="is-danger">
                                        <p>You must be logged in to download this item. if you don't have an account on appbal you can register.</p>
                                    </blockquote>
                                </div>
                                <div style="display: flex; justify-content: center">
                                    <a href="<?= base_url("auth/login") ?>" class="button h-button is-info is-rounded is-elevated m-1">
                                        <span class="icon">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span>Sign In</span>
                                    </a>
                                    <a href="<?= base_url("auth/register") ?>" class="button h-button is-primary is-rounded is-elevated m-1">
                                        <span class="icon">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span>Sign Up</span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-card-foot is-end">
                            <p><small><?= $row->title ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($row->tipe == 'member') {
            if (is_member()) {
        ?>
                <div id="modal-member" class="modal h-modal">
                    <div class="modal-background  h-modal-close"></div>
                    <div class="modal-content">
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <h3>DOWNLOAD</h3>
                                <button class="h-modal-close ml-auto" aria-label="close">
                                    <i data-feather="x"></i>
                                </button>
                            </header>
                            <div class="modal-card-body">
                                <?php foreach ($version as $v) { ?>
                                    <a href="<?= base_url("download/$v->id") ?>" class="button h-button is-info is-rounded is-elevated is-fullwidth m-b-10">
                                        <span class="icon">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span><?= $v->title ?></span>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="modal-card-foot is-end">
                                <p><small><?= $row->title ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>

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