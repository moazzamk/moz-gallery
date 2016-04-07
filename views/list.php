<style type="text/css">
    .moz-gallery-thumbnail {
        width: 100px;
        height: 100px;
    }
</style>
<a href="admin.php?page=moz-gallery-add-new" class="page-title-action">Add new</a>

<table>
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Thumbnail</th>
        <th>Description</th>
    </tr>

    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row->title; ?></td>
            <td><img src="<?= $row->image; ?>" class="moz-gallery-thumbnail"/></td>
            <td><img src="<?= $row->thumbnail; ?>" class="moz-gallery-thumbnail"/></td>
            <td><?= $row->description; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
