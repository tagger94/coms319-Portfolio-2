/**
 * 
 */
submit();

var msg = "";
var PwError = "passwords do not match \n";
var EmailError = "Invalid email format. Must be in form xxx@xxx.xxx where 'x' is alphanumeric \n";

/*runs the methods to make sure the form is valid. If so than it calls the createAccount method*/
function submit() {
	$(document).ready(function() {
		$("#submit").click(function() {
			isEmployee();
			if (true) {
				msg += checkNull();
			}
			if (!checkPw()) {
				msg += PwError;
			}
			if (!checkEmail()) {
				msg += EmailError;
			}
			msg += securePw();
			if (msg != "") {
				alert(msg);
			}
			else {
				createAccount();
			}
			msg = "";
		});
	});
	// /^[a-z0-9]+$/i
}
/*Check if any of the fields were left empty*/
function checkNull() {
	var msg = "You must not leave fields blank: \n";
	var valid = [];
	var flag = false;
	valid = $(".valid").toArray();
	for (var i = 0; i < valid.length - 1; i++) {
		if (!Boolean(valid[i].value)) {
			msg += "      " + valid[i].getAttribute("name") + "\n";
			flag = true;
		}
	}
	if (flag) {
		return (msg);
	}
	else
		return "";
}

/*Checks if the password matches the confirm password field*/
function checkPw() {
	var password = $("#pw").val();
	var confrmpw = $("#conpw").val();
	if (password == confrmpw) {
		return true;
	}
	return false;
}

function isEmployee() {
	//if ($('#isEmp').is(":checked")) {
	if ($('#isEmp').prop('checked')) {
		return true;
	}
	return false;
}

/**
 * Check if email fulfills validation requirments Is valid if contains '@' and '.' 
 */
function checkEmail() {

	var email = $("#email").val();
	var i = 0;
	var j = 0;
	while (email[i] != '@') {
		if (i == email.length) {
			alert("1");
			return false
		}
		i++;
	}
	j = i;
	for (i = 0; i < j; i++) {
		if (!isAlphaNumericWithPeriod(email[i])) {
			alert("2");
			return false;
		}

	}
	i = j + 1;
	temp = i;
	while (email[i] != '.') {
		if (i == email.length) {
			alert("3");
			return false
		}
		i++;
	}
	j = i
	for (i = temp; i < j; i++) {
		if (!isAlphaNumeric(email[i])) {
			alert("4");
			return false;
		}

	}
	for (i = j + 1; i < email.length; i++) {
		if (!isAlphaNumeric(email[i])) {
			alert("5" + i);
			return false;
		}

	}

	return true;
	//return true

}

/**
 * Checks if the password meets security criteria. 
 * Password is considered secure if it contains at leats one capital letter, one lower case, and one number
 */
function securePw() {
	var password = $("#pw").val();
	var upperFlag = false;
	var lowerFlag = false;
	var intFlag = false;

if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(password))
{
	return "";
}
	return "Error: Password must contain at least one of the following: lower case letter, uppercase letter, and number";
} //END function

/**
 * Checks if string is alphanumic
 * 
 * @param string
 * @returns true if string is alphanumaric;
 */
function isAlphaNumeric(string) {
	if (/[^a-zA-Z0-9]/.test(string)) {
		return false
	}
	return true;
}

/*Sends the user input to a php class that will add it to the user database. Alerts if the email address is taken*/
function createAccount() {
	var userEmail = $("#email").val();
	var pw = $("#pw").val();
	var employee = "false";
	if ($('#isEmp').prop('checked')) {
		employee = "true";
	}
	$.post("php/createUser.php", {
			email: userEmail,
			password: pw,
			isEmployee: employee
		},
		function(data, status) {
			if (data == "true") {
				document.location.href = "Login.php";
			}
			else {
				alert("User email already exists");
			}
		});
}

function isNumeric(string) {
	if (/[^0-9]/.test(string)) {
		return false;
	}
	return true;
}

function isAlphaNumericWithPeriod(string) {
	if (/[^a-zA-Z0-9.]/.test(string)) {
		return false
	}
	return true;
}