<?php
/*
 * This function is used to display the profile image of the users.
 */
function change_profile_image($user_id, $file_temp, $file_extn) {
	$file_path = 'image/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `users` SET `profile` = '" . mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$user_id);
}
/*
 * This function is used to notify patients to come in for check-ups.
 * Doctor sends email to his/her patients that wants to be notified through their email address.
 */
function mail_users($subject, $message) {
	$query = mysql_query("SELECT `email`, `first_name` FROM `users` WHERE `allow_email` = 1 AND `type` = 0");
	while (($row = mysql_fetch_assoc($query)) !== false) {
		email($row['email'], $subject, "Hello " . $row['first_name'] . ",\n\n" . $message . "\n\n- Diabetes Management System");
	}
}


/*
 * This function is used to send email to doctors to schedule an appointment.
 */
function mail_doctor($fullname, $email, $subject, $message, $from) {
	//$query = mysql_query("SELECT `email` FROM `users` WHERE `type` = 0");
	//while (($row = mysql_fetch_assoc($query)) !== false) {
		
	//	email($row['email'], $subject, "Hello " . $row['first_name'] . ",\n\n" . $message . "\n\n- Diabetes Management System");
	//}
	mail($email, $subject, $message, "From:".$from);
}

function loginRole($login){
	
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `user_id` = $login"));
}

/*
 * This function is for displaying the number of patients that are registered with the Diabetes Management System.
 * This information is displayed only to the Doctors.
 */
function totalpatient_count(){
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1 AND `type` = 0"), 0);
}
/*
 * This function is for displaying the total number of users, using the Diabetes Management System.
 */
function totaluser_count(){
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0);
}

function recover($mode, $email) {
	$mode 		 = sanitize($mode);
	$email 		 = sanitize($email);
	
	$user_data	 = patient_data(user_id_from_email($email), 'user_id', 'first_name', 'username');
	
	if ($mode == 'username') {
		//Recover Username
		email($email, 'Your username', "Hello " . $user_data['first_name'] . ", \n\nYour username is: " . $user_data['username'] . "\n\n-Diabetes Management System");
	} else if ($mode == 'password') {
		//Recover Password
		$generated_password = substr(md5(rand(999, 999999)), 0, 8);
		change_password($user_data['user_id'], $generated_password);
		
		update_user($user_data['user_id'], array('password_recover' => '1'));
		email($email, 'Your password recovery', "Hello " . $user_data['first_name'] . ", \n\nYour new password is: " . $generated_password . "\n\n-Diabetes Management System");
	}
}
/*
 * Updating users' information in the database.
 */
function update_user($user_id, $update_data) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach ($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `users` SET " . implode(', ', $update) . " WHERE `user_id` = $user_id");
}

function update_glucose($user_id, $updateglucose_data){
	$update = array();
	array_walk($updateglucose_data, 'array_sanitize');

	foreach ($updateglucose_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	mysql_query("UPDATE `bloodglucoselevel` SET " . implode(', ', $update) . " WHERE `id` = $id");
}

/*
 * Inserting patient's blood glucose level records into the database.
 */
function insert_bloodsugarlevel($user_id,$insert_data) {
	array_walk($insert_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($insert_data)) . '`';
	$data = '\'' . implode('\', \'', $insert_data) . '\'';
	
	mysql_query("INSERT INTO `bloodglucoselevel` ($fields) VALUES ($data)");
}

/*
 * Inserting patients Personal Notes into the database and retrieveing it for them.
 */
function insert_personalnotes($user_id, $insert_notes){
	array_walk($insert_notes, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($insert_notes)) . '`';
	$data = '\'' . implode('\', \'', $insert_notes) . '\'';
	
	mysql_query("INSERT INTO `personalnotes` ($fields) VALUES ($data)");
}

function activate($email, $email_code) {
	$email 		=mysql_real_escape_string($email);
	$email_code =mysql_real_escape_string($email_code);
	
	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0"), 0) == 1) {
		//Query to update user active status.
		mysql_query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
		return true;
	} else  {
		return false;
	}
}

function change_password($user_id, $password) {
	$user_id = (int) $user_id;
	$password = md5($password);
	
	mysql_query("UPDATE `users` SET `password` = '$password', `password_recover` = 0 WHERE `user_id` = $user_id");
}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
    
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	
	email($register_data['email'], 'Activate your account', "Hello " . $register_data['first_name'] . ", \n\nYou need to activate your account, therefore use the link below:\n\nhttp://localhost/dms/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\n- Diabetes Management System");
}


/*
 * The code below is for logging into the Diabetes Management System and displaying the User's Data.
 */
function patient_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1){
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		 return $data;
	}

}
 
function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"), 0) == 1) ? true : false;
}

function phone_exists($phonenumber) {
	$phonenumber = sanitize($phonenumber);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `phone_number` = '$phonenumber'"), 0) == 1) ? true : false;
}
function email_exists($email) {
	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'"), 0) == 1) ? true : false;
}

function user_active($username) {
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"),0) == 1) ? true : false;
}

function user_id_from_username($username) {
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
}

function user_id_from_email($email) {
	$email = sanitize($email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"), 0, 'user_id');
}

function login($username, $password){
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = md5($password);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>
