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
       ADDING A DELETE BUTTON
       =========================================
    -->
    <form class="mt-4" method="POST">
      <input type="hidden" name="id" value="<?= $note["id"]; ?>">
      <button
        class="rounded-md border-b-4 border-b-purple-600 hover:border-b-red-600 bg-black px-3 py-2 text-sm text-purple-600 hover:text-red-600 ">Delete</button>
    </form>
    <!-- =END= -->


  </div>
</main>
</div>

</body>

</html>