<link href="/NotenNest/css/header.css" rel="stylesheet" />

<div id="header" class="container-fluid p-0 shadow" style="height: 64px;">
    <nav class="h-100 navbar navbar-expand-lg p-0">
        <div id="navbar-container" class="container-fluid h-100">
            <a class="navbar-brand" href="<?php echo $BASE_URL . '/'?>">
                <h2>NotenNest</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse h-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-12 mb-2 mb-lg-0 h-100">
                    <li class="nav-item <?php shouldBeHighlighted('instruments') ?>">
                        <a class="nav-link active" href="<?php echo $BASE_URL . '/instruments' ?>"><span
                                class="nav-link-text d-inline-block">Instrumente</span></a>
                    </li>
                    <li class="nav-item <?php shouldBeHighlighted('partners') ?>">
                        <a class="nav-link active" href="<?php echo $BASE_URL . '/partners' ?>"><span
                                class="nav-link-text d-inline-block">Partner</span></a>
                    </li>
                    <li class="nav-item <?php shouldBeHighlighted('contact') ?>">
                        <a class="nav-link active" href="<?php echo $BASE_URL . '/contact' ?>"><span
                                class="nav-link-text d-inline-block">Kontakt</span></a>
                    </li>
                    <li class="nav-item <?php shouldBeHighlighted('about') ?>">
                        <a class="nav-link active" href="<?php echo $BASE_URL . '/about' ?>"><span
                                class="nav-link-text d-inline-block">Über Uns</span></a>
                    </li>
                    <p>
                        <?php $CURRENT_PATH ?>
                    </p>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- <div id="content" class="" style="height: calc(100hv - 128px);"> -->
<div id="mainContent" style="flex: 1; padding: 0px 20px; min-height: calc(100vh - 128px);">
    <?php
    function shouldBeHighlighted($url) {
        if (str_contains($GLOBALS['CURRENT_PATH'], $url)) {
            echo 'nav-item_selected';
        }
    }
    
    ?>