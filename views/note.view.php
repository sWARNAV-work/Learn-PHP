<?php require 'partials/head.php'; ?>
  <?php require 'partials/nav.php'; ?>
  <?php require('partials/banner.php');?>

  <?php $id = $_GET['id'];?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      
      <p class = "mb-6">
        <a href = "/notes" class = "text-blue-900 hover:underline mb-6">Get Back to the Notes. Bitch.</a>
      </p>

      <p>This is the Note <?= $note['id']; ?> </p> 
         <b> <?= htmlspecialchars($note['body']); ?> </b>
      
    </div>
  </main>
</div>

</body>
</html>