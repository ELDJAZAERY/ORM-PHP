<?php  $this->_t = 'Admins Control Page'; ?>
<body style="display:block";>
  <h1>  WELCOME TO Admin's Control PAGE  </h1>

  <form id="form1" action=<?= htmlspecialchars(URL.'admin/add-admin'); ?> method="post" class="form-signin">
    <h2 class="form-signin-heading">Add admin</h2>
    <input type="text" name="firstname" class="form-control" placeholder="First Name" required autofocus>
    <input type="text" name="lastname"  class="form-control" placeholder="Last Name" required autofocus>
    <input type="date" name="birthdate" class="form-control" required autofocus>
    <input type="text" name="username"  class="form-control" placeholder="User name" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label style="float:left;" >
        <input type="checkbox" value="super_admin" > Super Admin
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Add Admin</button>
  </form>

</body>


<!--
 /// checkbox
<form action="myscript.php" method="post">
  <input type="checkbox" name="myCheckbox[]" value="A" />val1<br />
  <input type="checkbox" name="myCheckbox[]" value="B" />val2<br />
  <input type="checkbox" name="myCheckbox[]" value="C" />val3<br />
  <input type="checkbox" name="myCheckbox[]" value="D" />val4<br />
  <input type="checkbox" name="myCheckbox[]" value="E" />val5
  <input type="submit" name="Submit" value="Submit" />
</form>


-->
