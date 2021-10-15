<?= var_dump($users); ?>
<?php if (! empty($users) && is_array($users)) : ?>

    <?php foreach ($users as $users_item): ?>

        <h3><?= esc($users_item['id']) ?></h3>

        <div class="main">
            <?= esc($users_item['nick']) ?>
        </div>
        <p><a href="/users/<?= esc($users_item['nick'], 'url') ?>">View article</a></p>

    <?php endforeach; ?>

<?php else : ?>

    <h3>No Users</h3>

    <p>Unable to find any users for you.</p>

<?php endif ?>
