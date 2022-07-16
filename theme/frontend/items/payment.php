<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => "Payment Method",
        'description' => $websettings->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => 'source code,bal, appbal, sc, php,nodejs,botwa',
        'url' => base_url(),
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
                            <h1 class="title is-4">Payment</h1>
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
                        <div class="standard-onboarding">
                            <div class="title-wrap">
                                <p>Payment method</p>
                                <h2>There are several payment options that can be used.</h2>
                            </div>

                            <div class="onboarding-wrap">
                                <div class="onboarding-wrap-inner">
                                    <?php if ($row->btn_wabuy != '') { ?>
                                        <div class="onboarding-card">
                                            <h3>Whatsapp Message</h3>
                                            <p>This method will be processed manually via whatsapp admin, you can contact by clicking the button below.</p>
                                            <div class="button-wrap">
                                                <a href="<?= $row->btn_wabuy ?>" class="button h-button is-primary is-outlined is-rounded is-raised">PAY</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="onboarding-card">
                                        <h3>Midtrans</h3>
                                        <p>24 Hours Automatic Payment is easy to use and many payment options such as ovo, gopay bank etc.</p>
                                        <div class="button-wrap">
                                            <a href="javascript:void(0)" id="pay-button" class="button h-button is-primary is-outlined is-rounded is-raised">PAY</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <form id="payment-form" method="post" action="<?= base_url('pay/finish') ?>">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <input type="hidden" name="res_ip" id="res_ip-ip" value="<?= $row->id ?>">
        </form>
        <script src="<?= _frontEnd() ?>js/app.js"></script>
        <script src="<?= _frontEnd() ?>js/functions.js"></script>
        <script src="<?= _frontEnd() ?>js/main.js" async></script>
        <script src="<?= _frontEnd() ?>js/components.js" async></script>
        <script src="<?= _frontEnd() ?>js/popover.js" async></script>
        <script src="<?= _frontEnd() ?>js/widgets.js" async></script>
        <!-- Additional Features -->
        <script src="<?= _frontEnd() ?>js/touch.js" async></script>
        <script src="<?= _frontEnd() ?>js/syntax.js" async></script>
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-IWSqs-gN6QCYtn-P"></script>
        <script>
            $('#pay-button').click(function(event) {
                event.preventDefault();
                $(this).attr("disabled", "disabled");
                $(this).removeClass("button h-button is-primary is-outlined is-rounded is-raised");
                $(this).addClass("button h-button is-primary is-outlined is-loading is-rounded is-raised");

                var postForm = {
                    'id_product': "<?= $row->id ?>"
                };
                $.ajax({
                    url: '<?= site_url() ?>/pay/midtrans',
                    type: 'post',
                    data: postForm,
                    cache: false,
                    success: function(data) {

                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                            //resultType.innerHTML = type;
                            //resultData.innerHTML = JSON.stringify(data);
                        }

                        snap.pay(data, {
                            onSuccess: function(result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function(result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function(result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
            });
        </script>
        </script>
    </div>
</body>

</html>