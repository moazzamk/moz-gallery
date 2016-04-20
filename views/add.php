<h1>Moz Gallery - Add Images</h1>

<style type="text/css">
    .moz-gallery-add-label {
        width: 150px;
        float: left;
        margin-bottom: 10px;
        padding-right: 10px;
    }
    .moz-gallery-add-input {

    }
    .moz-gallery-add-container {
        padding-top: 15px;
        width: 90%;
    }
    .moz-gallery-add-container input[type=text] {
        width: 70%;
        margin-bottom: 10px;
    }
    .moz-gallery-add-container textarea {
        width: 70%;
        height: 50px;
        margin-bottom: 10px;

    }
    .moz-gallery-add-container h2 {
        margin: 0.5em;
    }
    .clearfix {
        clear: both;
    }
</style>
<form action="<?= get_admin_url() ?>/admin-post.php" method="post">
    <input type="hidden" name="action" value="moz_gallery_add_image" />
    <input type="hidden" name="id" value="<?= empty($data['id']) ? '' : $data['id']; ?>" />


    <div class="stuffbox moz-gallery-add-container">
        <div class="inside">
            <div class="moz-gallery-add-label">Title:</div><div class="moz-gallery-add-input"><input type="text" name="title" value="<?= empty($data['title']) ? '' : $data['title']; ?>" /> </div><div class="clearfix"></div>
            <div class="moz-gallery-add-label">Image:</div><div class="moz-gallery-add-input"> <input type="text" name="image" value="<?= empty($data['image']) ? '' : $data['image']; ?>" /></div><div class="clearfix"></div>
            <div class="moz-gallery-add-label">Thumbnail:</div> <div class="moz-gallery-add-input"><input type="text" name="thumbnail" value="<?= empty($data['thumbnail']) ? '' : $data['thumbnail']; ?>" /></div><div class="clearfix"></div>
            <div class="moz-gallery-add-label">Description:</div> <div class="moz-gallery-add-input"><textarea name="description"><?= empty($data['description']) ? '' : $data['description']; ?></textarea></div><div class="clearfix"></div>
            <div><input type="submit" value="Save" class="button button-primary"/></div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>
