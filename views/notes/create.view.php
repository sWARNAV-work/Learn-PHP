<?php require base_path('views/partials/head.php'); ?>
  <?php require base_path('views/partials/nav.php'); ?>
  <?php require base_path('views/partials/banner.php'); ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <form method="POST" action="/notes">
        <div class="space-y-12">
          <div class="border-b border-white/10 pb-12">

            <div class="col-span-full">
              <label for="body" class="block text-sm/6 font-medium text-white">Enter your note: </label>
              <div class="mt-2">
                <textarea id="body" name="body" placeholder="Enter your ideas here..." rows="3"
                  class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= $_POST["body"] ?? "" ?></textarea>
                <?php if (isset($errors['body'])): ?>
                  <p class="text-red-900 font-bold text-xs mt-2"><?= $errors['body'] ?></p>
                <?php endif; ?>




              </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm/6 font-semibold text-white"><a href="/notes">Cancel</a></button>
              <button type="submit"
                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
      </form>


    </div>
  </main>
  </div>

  </body>

  </html>