function validate_mobile() {
  const phone_input = document.getElementById("phone");
  let phone = phone_input.value;

  valid_number = phone.match(
    "(?:\\+88|88)?(01[3-9]\\d{8})"
  ); /*Regular expression to validate number*/

  if (valid_number) {
    // document.write("valid");
    return true; /*valid number method return 3 with actual input*/
  } else {
    alert("Enter valid phone number");
    document.getElementById("access-form").reset();
    // document.write("invalid");
    return false; /*return false when not valid*/
  }
}
function validate_mbl_pass() {
  if (validate_mobile()) {
    if (
      document.getElementById("pwd").value ==
      document.getElementById("c_pwd").value
    ) {
      console.log("returned true");
      return true;
    } else {
      alert("Provide same passwords for two fields");
      document.getElementById("access-form").reset();
      console.log("false returned");
      return false;
    }
  } else {
    document.getElementById("access-form").reset();
    return false;
  }
}
