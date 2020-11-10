<?php require 'app/views/partials/header.php' ?>
<?php require 'app/views/partials/nav.php' ?>
<h2>home page</h2>
<?php foreach ($users as $index => $user)?>
<p><?php echo $user->id; ?></p>
<p><?php echo $user->username; ?></p>
<p><?php echo $user->first_name; ?></p>
<p><?php echo $user->last_name; ?></p>
<?php require 'app/views/partials/footer.php' ?>
