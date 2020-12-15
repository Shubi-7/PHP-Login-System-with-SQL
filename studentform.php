
<html>
<head>
<title>Student Registration Form</title>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<form class="form-horizontal" action='db_stdrecord.php' method="POST" enctype="multipart/form-data">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" name="name" placeholder="" class="input-xlarge">
        <p class="help-block">Username can contain any letters or numbers.</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Course</label>
      <div class="controls">
        <input type="text" name="course" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your Coursename.</p>
      </div>
    </div>

        <div class="control-group">

    <div class="control-group">
      <label class="control-label">Address</label>
      <div class="controls">
        <input type="text" name="address" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your address.</p>
      </div>
    </div>
 
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="image">Image</label>
      <div class="controls">
        <input type="file" name="upload" placeholder="" class="input-xlarge">
        <p class="help-block">Please Upload Photo</p>
      </div>
    </div>

    <input type="hidden" name="type" value="student">
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" name="submit" value="uploadImage">Register</button>
      </div>
    </div>
  </fieldset>
</form>
</body>
</html>