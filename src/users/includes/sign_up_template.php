<form method="POST" action="sign_up.php" name="sign_up_form">
  <div class="form-group">
    <label for="firstnameInput">Firstname</label>
    <input type="text" class="form-control" id="firstnameInput"placeholder="Enter your firstname" name="firstname" required>
  </div>
  <div class="form-group">
    <label for="lastnameInput">Lastname</label>
    <input type="text" class="form-control" id="lastnameInput"placeholder="Enter your lastname" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
  </div>
  <button type="submit" name="sign_up_submit" class="btn btn-primary">Submit</button>
</form>