function errormsg() {
  if (document.getElementById("passwd").value == "") {
    document.getElementsById("pwd").innerHTML = "Please enter password";
    return false;
  }
}
