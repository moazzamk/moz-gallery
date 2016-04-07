<?php $viewsDir = plugin_dir_url(__DIR__ . '/../moz-gallery.php') . '/views'; ?>
<link href="<?= $viewsDir ?>/css/lightbox.css" rel="stylesheet">
<style type="text/css">
    .clear-both {
        clear: both;
    }
    .moz-gallery-container {

    }
    .moz-gallery-list-item-container {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .moz-gallery-list-item-image-container {
        width: 200px;
        height: 180px;
    }
    .moz-gallery-list-item-image-container img {
        height: 100%;
        width: 100%;
    }
</style>

<div class="moz-gallery-container">
    <?php foreach ($data as $item): ?>
        <div class="moz-gallery-list-item-container">
            <div class="moz-gallery-list-item-image-container">
                <a href="<?= $item->image; ?>" data-lightbox="some-set" data-title="<?= $item->title ?> ">
                    <img src="<?= $item->thumbnail; ?>" />
                </a>
            </div>
            <div><?= $item->title ; ?></div>
        </div>
    <?php endforeach; ?>
    <div class="clear-both"></div>
</div>
<script src="<?= $viewsDir ?>/js/lightbox-plus-jquery.min.js"
<script src="<?= $viewsDir ?>/js/lightbox.js"></script>
<script type="text/javascript">
    lightbox.option({
        resizeDuration: 200,
        wrapAround: true
    })
</script>
