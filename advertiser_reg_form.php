<div class="form-group">
     <label for="firstname" >Firstname</label>
     <input type="text" name="firstname" id="firstname" class="form-control">
 </div>
 <div class="form-group">
     <label for="lastname">Lastname</label>
     <input type="text" name="lastname" id="lastname" class="form-control">
 </div>
 <div class="form-group">
    <label for="email" >Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" value="">
    <p><?php echo isset ($error['email']) ? $error['email']." <a href=''>Login in</a>" : '' ?></p>
</div>
 <div class="form-group">
     <label for="username">Username</label>
     <input type="text" name="username" id="username" class="form-control" value="">
     <p><?php echo isset ($error['username']) ? $error['username'] : ''  ?></p>
 </div>
 <div class="form-group">
     <label for="username">Company Name (optional)</label>
     <input type="text" name="company_name" id="company_name" class="form-control" value="">
 </div>
  <div class="form-group">
     <label for="password">Password</label>
     <input type="password" name="password" id="key" class="form-control">
     <p><?php echo isset ($error['password']) ? $error['password'] : ''  ?></p>
 </div>
 <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_key" class="form-control">
    <p><?php echo isset ($error['password']) ? $error['password'] : ''  ?></p>
</div>
