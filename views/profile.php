<?php 
/** @var $this \lvl\phpcoremvc\View */
$this->title = 'Profile'; 
?>

<h1>
	Profile
</h1>

<form action="" method="post">
  <div class="form-group">
    <label>Subject</label>
    <input type="tetx" name="subject" class="form-control">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="tetx" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>