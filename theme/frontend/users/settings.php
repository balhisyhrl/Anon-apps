<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => 'Account Settings',
        'description' => 'Settings My Account App bal.',
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => '',
        'keywords' => '',
        'url' => base_url("users/settings"),
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
                            <h1 class="title is-4" style="text-transform: capitalize;">Settings</h1>
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
                        <!--Edit Profile-->
                        <div class="account-wrapper">
                            <div class="columns">

                                <!--Navigation-->
                                <div class="column is-4">
                                    <div class="account-box is-navigation">
                                        <div class="media-flex-center">
                                            <div class="h-avatar is-large">
                                                <img class="avatar" src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                                            </div>
                                            <div class="flex-meta">
                                                <span><?= $row->name ?></span>
                                                <span><?= $row->email ?></span>
                                            </div>
                                        </div>

                                        <div class="account-menu">
                                            <a href="javascript:void(0)" class="account-menu-item is-active">
                                                <i class="lnil lnil-user-alt"></i>
                                                <span>General</span>
                                                <span class="end">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" class="account-menu-item h-modal-trigger" data-modal="modal-c-email">
                                                <i class="lnil lnil-quotation"></i>
                                                <span>Change Email</span>
                                                <span class="end">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" class="account-menu-item h-modal-trigger" data-modal="modal-c-username">
                                                <i class="lnil lnil-consulting"></i>
                                                <span>Change Username</span>
                                                <span class="end">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)l" class="account-menu-item h-modal-trigger" data-modal="modal-c-password">
                                                <i class="lnil lnil-shield"></i>
                                                <span>Change Password</span>
                                                <span class="end">
                                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="column is-8">
                                    <div class="account-box is-form is-footerless">
                                        <form action="" method="post">
                                            <div class="form-head stuck-header">
                                                <div class="form-head-inner">
                                                    <div class="left">
                                                        <h3>General Info</h3>
                                                        <p>Edit your account's general information</p>
                                                    </div>
                                                    <div class="right">
                                                        <div class="buttons">
                                                            <a href="<?= base_url("users/$us->username") ?>" class="button h-button is-light is-dark-outlined">
                                                                <span class="icon">
                                                                    <i class="lnir lnir-arrow-left rem-100"></i>
                                                                </span>
                                                                <span>Go Back</span>
                                                            </a>
                                                            <button type="submit" class="button h-button is-primary is-raised">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                <div class="fieldset">
                                                    <div class="fieldset-heading">
                                                        <h4>Profile Picture</h4>
                                                        <p>Use a 1:1 profile photo</p>
                                                    </div>

                                                    <div class="h-avatar profile-h-avatar is-xl">
                                                        <img class="avatar" src="<?= _storage("avatar/$us->avatar") ?>" onerror="this.onerror=null;this.src='<?= _storage('avatar/default.jpg') ?>';" alt="<?= $us->username ?>">
                                                        <button type="button" class="button is-circle edit-button is-edit h-modal-trigger" data-modal="modal-gal-avatar">
                                                            <span class="icon is-small">
                                                                <i data-feather="edit-2"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="fieldset">
                                                    <div class="fieldset-heading">
                                                        <h4>Personal Info</h4>
                                                        <p>Others diserve to know you more</p>
                                                    </div>

                                                    <div class="columns is-multiline">
                                                        <div class="column is-12">
                                                            <div class="field">
                                                                <div class="control has-icon">
                                                                    <input type="text" class="input" name="name" value="<?= $us->name ?>" placeholder="Full Name" required>
                                                                    <div class="form-icon">
                                                                        <i data-feather="user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column is-12">
                                                            <div class="field">
                                                                <div class="control">
                                                                    <textarea class="textarea" rows="4" name="bio" placeholder="About / Bio"><?= $us->bio ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
        <script src="<?= _frontEnd() ?>js/touch.js" async></script>
        <script src="<?= _frontEnd() ?>js/syntax.js" async></script>
        <script src="<?= _frontEnd() ?>js/bal.js"></script>
        <?php require_once(VIEWPATH . "frontend/include/addons.php") ?>


        <div id="modal-c-email" class="modal h-modal">
            <div class="modal-background h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Change Email</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <form id="changeemail">
                        <div class="modal-card-body">
                            <div class="field">
                                <label>New Email</label>
                                <div class="control">
                                    <input type="email" class="input" name="new_email" placeholder="Enter new email" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <div class="control">
                                    <input type="password" class="input" name="password" placeholder="*******" required>
                                    <small>
                                        <p>For security purposes, enter a password.</p>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-card-foot is-end">
                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                            <div class="btn-save">
                                <button type="submit" class="button h-button is-primary is-raised is-rounded">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="modal-c-username" class="modal h-modal">
            <div class="modal-background h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Change Username</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <form id="changeusername">
                        <div class="modal-card-body">
                            <div class="field">
                                <label>New Email</label>
                                <div class="control">
                                    <input type="text" class="input" name="new_username" id="input_username" placeholder="Enter a new username" required>
                                    <p><small>Use - to replace spaces, and only all lowercase letters are allowed.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-card-foot is-end">
                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                            <div class="btn-save">
                                <button type="submit" class="button h-button is-primary is-raised is-rounded">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="modal-c-password" class="modal h-modal">
            <div class="modal-background h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Change Password</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <form id="changepassword">
                        <div class="modal-card-body">
                            <div class="field">
                                <label>Old Password</label>
                                <div class="control">
                                    <input type="text" class="input" name="old_password" id="default-03" placeholder="*******" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>New Password</label>
                                <div class="control">
                                    <input type="text" class="input" name="new_password" id="default-03" placeholder="*******" required minlength="5">
                                </div>
                            </div>
                        </div>
                        <div class="modal-card-foot is-end">
                            <a class="button h-button is-rounded h-modal-close">Cancel</a>
                            <div class="btn-save">
                                <button type="submit" class="button h-button is-primary is-raised is-rounded">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="modal-gal-avatar" class="modal h-modal">
            <div class="modal-background  h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Avatar</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <div class="modal-card-body" id="content-galleryavatar">
                        <div class="columns is-multiline">
                            <?php foreach ($galleryavatar as $ga) : ?>
                                <div class="column is-3">
                                    <a onclick='changeAvatar("default/<?= $ga ?>")' href="javascript:void(0)">
                                        <div class="mb-2">
                                            <img src="<?= _storage("avatar/default/$ga") ?>">
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#changepassword").submit(function(e) {
                $(".btn-save").html('<button disabled class="button h-button is-primary is-loading is-rounded">Button</button>');
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url("users/ajax/changepassword") ?>',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == 'berhasil') {
                            location.reload();
                        } else {
                            toastbal.error(data)
                        }
                        $(".btn-save").html('<button type="submit" class="button h-button is-primary is-raised is-rounded">Save Change</button>');
                    }
                });
            })

            $("#changeusername").submit(function(e) {
                $(".btn-save").html('<button disabled class="button h-button is-primary is-loading is-rounded">Button</button>');
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url("users/ajax/changeusername") ?>',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == 'berhasil') {
                            location.reload();
                        } else {
                            toastbal.error(data)
                        }
                        $(".btn-save").html('<button type="submit" class="button h-button is-primary is-raised is-rounded">Save Change</button>');
                    }
                });
            })

            $("#changeemail").submit(function(e) {
                $(".btn-save").html('<button disabled class="button h-button is-primary is-loading is-rounded">Button</button>');
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url("users/ajax/changeemail") ?>',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == 'berhasil') {
                            location.reload();
                        } else {
                            toastbal.error(data)
                        }
                        $(".btn-save").html('<button type="submit" class="button h-button is-primary is-raised is-rounded">Save Change</button>');
                    }
                });
            })

            $("#input_username").keyup(function() {
                var username = validateUserName($("#input_username").val())
                $("#input_username").val(username)
            })

            function validateUserName(username) {
                return username.toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            }

            function changeAvatar(filename) {
                if (filename == "<?= $row->avatar ?>") {
                    toastbal.error("Avatar you already use -_")
                } else {
                    $("#content-galleryavatar").html('<div style="text-align: center;"><a href="javascript:void(0)" class="button h-button is-loading"></a></div>')
                    $.ajax({
                        url: '<?= base_url("users/ajax/changeavatar") ?>',
                        type: 'post',
                        data: {
                            avatar: filename
                        },
                        success: function(data) {
                            if (data == 'berhasil') {
                                location.reload();
                            } else {
                                toastbal.error(data)
                            }
                        }
                    });
                }
            }
        </script>
    </div>
</body>

</html>