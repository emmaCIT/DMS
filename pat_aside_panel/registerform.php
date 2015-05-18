<form action="" method="post">
		<ul>
			<li>First name*: <br><input type="text" name="first_name" class="reg" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
			</li>
			<li>Last name: <br><input type="text" name="last_name" class="reg" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /> 
			</li>
			<li>Username*: <br><input type="text" name="username" class="reg" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" />
			</li>
			<li>Password*: (must be at least 8 characters)<br><input type="password" name="password" class="reg" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" />
			</li>
			<li>Password again*: <br><input type="password" name="password_again" class="reg" value="<?php if(isset($_POST['password_again'])) echo $_POST['password_again']; ?>" />
			</li>
			<li>Date of Birth*: <br><input type="date" name="DOB" class="reg" value="<?php if(isset($_POST['DOB'])) echo $_POST['DOB']; ?>" />
			</li>
			<li>Gender*:&nbsp;&nbsp;<input type="radio" name="gender" value="male">Male
			&nbsp;&nbsp;<input type="radio" name="gender" value="female">Female
			</li>
			<li>Phone Number*: <br><input type="number" name="phone_number" class="reg" value="<?php if(isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>" />
			</li>
			<li>Email address*: <br><input required placeholder="Enter a valid email address" type="email" name="email" class="reg" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /> <!-- Don't forget to use the html5 email field that enables clients side validation -->
			</li>
			<li>Address*: <br><textarea name="address" class="reg2"><?php if(isset($_POST['address'])) echo $_POST['address']; ?></textarea>
			</li>
			 <li>I am a*:
				<select name="type">
					<option value="0">Patient</option>
					<option value="1">Doctor</option>
				</select>
			</li>
			<li><input type="submit" value="Register"></li>
		</ul>
	</form>
	
	<script>

	</script>