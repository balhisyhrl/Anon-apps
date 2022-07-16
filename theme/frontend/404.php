<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= meta_tag([
        'title' => "404 :: Error",
        'description' => $websettings->seo_description,
        'favicon' => _storage($websettings->seo_favicon),
        'thumb' => _storage($websettings->seo_thumbnail),
        'keywords' => $websettings->seo_keywords,
        'url' => base_url('404'),
        'author' => 'ball'
    ]); ?>
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/app.css" />
    <link rel="stylesheet" href="<?= _frontEnd() ?>css/main.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" />
</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="minimal-wrapper darker">
            <div class="error-container">
                <div class="error-wrapper">
                    <div class="error-inner has-text-centered">
                        <div class="bg-number dark-inverted">404</div>
                        <img class="light-image" src="<?= _frontEnd() ?>img/illustrations/placeholders/error-2.svg" alt="" />
                        <img class="dark-image" src="<?= _frontEnd() ?>img/illustrations/placeholders/error-2-dark.svg" alt="" />
                        <h3 class="dark-inverted">We couldn't
                            find that page</h3>
                        <p>Looks like we couldn't find that page. Please try again or contact an administrator if the problem persists.</p>
                        <div class="button-wrap">
                            <a class="button h-button is-primary is-elevated" onclick="goBack()">Take me Back</a>
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
    </div>
</body>

</html>