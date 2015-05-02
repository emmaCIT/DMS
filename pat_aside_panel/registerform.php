<form action="" method="post">
		<ul>
			<li>Username*: <br><input type="text" name="username" class="reg">
			</li>
			<li>Password*: <br><input type="password" name="password" class="reg">
			</li>
			<li>Password again*: <br><input type="password" name="password_again" class="reg">
			</li>
			<li>First name*: <br><input type="text" name="first_name" class="reg">
			</li>
			<li>Last name: <br><input type="text" name="last_name" class="reg"> 
			</li>
			<li>Date of Birth*: <br><input type="date" name="DOB" class="reg">
			</li>
			<li>Gender*:&nbsp;&nbsp;<input type="radio" name="gender" value="male">Male
			&nbsp;&nbsp;<input type="radio" name="gender" value="female">Female
			</li>
			<li>Phone Number*: <br><input type="number" name="phone_number" class="reg">
			</li>
			<li>Email address*: <br><input required placeholder="Enter a valid email address" type="email" name="email" class="reg"> <!-- Don't forget to use the html5 email field that enables clients side validation -->
			</li>
			<li>Address*: <br><textarea name="address" class="reg2"> </textarea>
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