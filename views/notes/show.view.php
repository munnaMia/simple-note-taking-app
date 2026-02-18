<?php require(__DIR__ . '/../partials/header.php'); ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php'); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-xl text-blue-500 underline">go back...</a>
        </p>
        <p class="text-2xl text-blue-500 hover:underline">
            <?= htmlspecialchars($note['body']) ?>
        </p>

    </div>
</main>

<?php require(__DIR__ . '/../partials/footer.php'); ?>
