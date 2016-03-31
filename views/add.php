<h1>Moz Gallery - Add Images</h1>
    
<form action="<?= get_admin_url() ?>/admin-post.php" method="post">
    <input type="hidden" name="action" value="moz_gallery_add_image" />
    <input type="hidden" name="id" value="<?= empty($data['id']) ? '' : $data['id']; ?>" />
    Title: <input type="text" name="title" value="<?= empty($data['title']) ? '' : $data['title']; ?>" /> <br/>
    Image: <input type="text" name="image" value="<?= empty($data['image']) ? '' : $data['image']; ?>" /><br/>
    Thumbnail: <input type="text" name="thumbnail" value="<?= empty($data['thumbnail']) ? '' : $data['thumbnail']; ?>" /><br/>
    Description: <textarea name="description"><?= empty($data['description']) ? '' : $data['description']; ?></textarea>

    <input type="submit" value="Save" />
</form>
