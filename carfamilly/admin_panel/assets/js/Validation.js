function StudentRegvalidate() {
    let error = document.getElementById('error');
    let name = document.getElementById('fname').value;
    let email = document.getElementById('email').value;
    let rid = document.getElementById('rid').value;
    let pws = document.getElementById('password').value;
    let pws2 = document.getElementById('cpassword').value;
    let check=false;

    if (name == "" || email == "" || rid == "" || pws == ""|| pws2 == "") {
      error.innerText = "Empty Record"
    } else if
        (pws != pws2) {
        error.innerText = "Passwords not match"
        check = false;
        } else if (pws.length<8) {
          error.innerHTML="password length 8-15";
          check = false;
      }else{
     check = true;
    }
    return check;

  }


  function StaffRegvalidate() {
    let error = document.getElementById('error');
    let name = document.getElementById('fname').value;
    let email = document.getElementById('email').value;
    let mobile = document.getElementById('mobile').value;
    let pws = document.getElementById('password').value;
    let pws2 = document.getElementById('cpassword').value;
    let check=false;

    if (name == "" || email == "" || mobile == "" || pws == ""|| pws2 == "") {
      error.innerText = "Empty Record"
    } else if
        (pws != pws2) {
        error.innerText = "Passwords not match"
        check = false;
        } else if (pws.length<8) {
          error.innerHTML="password length 8-15";
          check = false;
      }else{
     check = true;
    }
    return check;

  }