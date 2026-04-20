<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <form id="del-button" method="POST" action="/note">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="<?= $note["id"]; ?>">
    </form>

    <form method="POST" action="/note">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="id" value="<?= $note["id"]; ?>">
      <div class="space-y-12">
        <div class="border-b border-white/10 pb-12">

          <div class="col-span-full">
            <label for="body" class="block text-sm/6 font-medium text-white">Edit your note: </label>
            <div class="mt-2">
              <textarea id="body" name="body" placeholder="Edit your ideas here..." rows="3"
                class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= $note["body"] ?? "" ?></textarea>

              <?php if (isset($errors['body'])): ?>
                <p class="text-red-900 font-bold text-xs mt-2"><?= $errors['body'] ?></p>
              <?php endif; ?>


              <div class="mt-6 flex items-center justify-between gap-x-6">
                <!-- =========================================
                        DELETE BUTTON
                    =========================================
                -->
                  <button form="del-button" type="submit"
                    class="rounded-md border-b-4 border-b-purple-600 hover:border-b-red-600 bg-black px-3 py-2 text-sm text-purple-600 hover:text-red-600 ">Delete</button>

                <!-- =END= -->

                <div class="flex items-center justify-end gap-x-6">
                  <a href="/note?id=<?= $note["id"]; ?>" class="text-sm/6 font-semibold text-white">Cancel</a>
                  <button type="submit"
                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
                </div>
              </div>

            </div>
          </div>
    </form>





  </div>
</main>
</div>

</body>

</html>