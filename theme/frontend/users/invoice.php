<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => 'INVOICE ' . $row->order_id,
        'description' => $websettings->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => 'library,appbal',
        'url' => base_url('invoice/' . $row->order_id),
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
                            <h1 class="title is-4" style="text-transform: capitalize;">INVOICE</h1>
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

                        <div class="invoice-wrapper">
                            <div class="invoice-header">
                                <div class="left">
                                    <h3>Invoice <?= $row->order_id ?></h3>
                                </div>
                                <div class="right">
                                    <div class="controls">
                                        <?php if ($row->status_code == '201') { ?>
                                            <a class="action h-modal-trigger" data-modal="modal-pay">
                                                <i data-feather="shopping-bag"></i>
                                            </a>
                                        <?php } ?>
                                        <a href="<?= base_url("invoice") ?>" class="action">
                                            <i data-feather="arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-body">
                                <div class="invoice-card">
                                    <div class="invoice-section is-flex is-bordered">

                                        <div class="meta">
                                            <h3><?= $row->title ?></h3>
                                            <span><?= $row->payment_type ?></span>
                                        </div>
                                        <div class="end">
                                            <h3>Invoice <?= $row->order_id ?></h3>
                                            <span>Status <?= $row->transaction_status ?></span>
                                            <span>Payment Due: <?= $row->transaction_time ?></span>
                                        </div>
                                    </div>
                                    <div class="invoice-section">
                                        <div class="flex-table">

                                            <!--Table header-->
                                            <div class="flex-table-header">
                                                <span class="is-grow">Description</span>
                                                <span>Quantity</span>
                                                <span>Rate</span>
                                                <span>Subtotal</span>
                                            </div>

                                            <!--Table item-->
                                            <div class="flex-table-item">
                                                <div class="flex-table-cell is-grow" data-th="">
                                                    <span class="dark-text"><?= $row->title ?></span>
                                                </div>
                                                <div class="flex-table-cell" data-th="Quantity">
                                                    <span class="light-text">1</span>
                                                </div>
                                                <div class="flex-table-cell" data-th="Rate">
                                                    <span class="dark-inverted"><?= "Rp." . format_number($row->gross_amount) ?></span>
                                                </div>
                                                <div class="flex-table-cell has-text-right" data-th="Subtotal">
                                                    <span class="dark-inverted"><?= "Rp." . format_number($row->gross_amount) ?></span>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="flex-table sub-table">
                                            <div class="flex-table-item">
                                                <div class="flex-table-cell is-grow is-vhidden" data-th="">
                                                    <span class="dark-text"><?= $row->title ?></span>
                                                </div>
                                                <div class="flex-table-cell cell-end is-vhidden" data-th="Unit">
                                                    <span class="light-text">Rate</span>
                                                </div>
                                                <div class="flex-table-cell is-vhidden" data-th="Quantity">
                                                    <span class="light-text">1</span>
                                                </div>
                                                <div class="flex-table-cell" data-th="">
                                                    <span class="table-label">Total</span>
                                                </div>
                                                <div class="flex-table-cell has-text-right" data-th="">
                                                    <span class="table-total is-bigger dark-inverted"><?= "Rp." . format_number($row->gross_amount) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <?php if ($row->status_code == '201') { ?>
            <div id="modal-pay" class="modal h-modal">
                <div class="modal-background  h-modal-close"></div>
                <div class="modal-content">
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <h3>PAY INVOICE</h3>
                            <button class="h-modal-close ml-auto" aria-label="close">
                                <i data-feather="x"></i>
                            </button>
                        </header>
                        <div class="modal-card-body">
                            <?php if ($row->payment_type == 'bank_transfer') { ?>
                                <p class="has-text-centered is-4 title" style="text-transform: uppercase;"><?= $row->bank ?></p>
                                <div class="content">
                                    <blockquote class="is-primary">
                                        <p class="has-text-centered is-6 title"><?= $row->va_numbers ?></p>
                                    </blockquote>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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
    </div>
</body>

</html>