<style type="text/css">
    .moz-gallery-thumbnail {
        width: 200px;
        height: 200px;
    }
</style>
<a href="" class="page-title-action">Add new</a>
<table>
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Thumbnail</th>
        <th>Description</th>
    </tr>

    <?php foreach ($data as $row): ?>
        <tr>
            <th><?= $row->title; ?></th>
            <th><img src="<?= $row->image; ?>" class="moz-gallery-thumbnail"/></th>
            <th><img src="<?= $row->thumbnail; ?>" class="moz-gallery-thumbnail"/></th>
            <th><?= $row->description; ?></th>
        </tr>
    <?php endforeach; ?>
</table>
