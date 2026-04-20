<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<?php $id = $_GET['id']; ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <p class="mb-6">
      <a href="/notes" class="text-blue-900 hover:underline mb-6">Get Back to My Notes</a>
    </p>

    <p>This is the Note <?= $note['id']; ?> </p>
    <b> <?= htmlspecialchars($note['body']); ?> </b>

    <!-- =========================================
       EDIT BUTTON
       =========================================
    -->
    <div class="mt-6">
      <a href="/note/edit?id=<?= $note['id']; ?>"
        class="rounded-md border-b-4 border-b-purple-600 hover:border-b-green-800 bg-black px-3 py-2 text-sm text-purple-600 hover:text-green-800">EDIT</a>
    </div>
    <!-- =END= -->

    <!-- Moved Delete Button to edit.view.php -->


  </div>
</main>
</div>

</body>

</html>