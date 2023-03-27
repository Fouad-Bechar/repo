function myFunction001() {
    var text = "Are you sure to delete your account !";
    var delt =  document.getElementById("d1");
    if (confirm (text) == true ) {
    delt.href ="delete.php"; } 
    else { delt.href =""; } }