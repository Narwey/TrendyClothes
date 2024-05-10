//--- Function to open the login popup
function openLoginPopup() {
    document.getElementById("SignPopup").style.display = "block";
    document.body.classList.add('blur'); 
}

//---- Function to open the register popup
function openRegisterPopup() {
    document.getElementById("registerPopup").style.display = "block";
    document.body.classList.add('blur'); // doesn't work to check after
    closePopup('SignPopup'); 
}

//----- Function to open the login form
function openLogin() {
    document.getElementById("LoginPopup").style.display = "block";
    document.body.classList.add('blur'); 
    closePopup('SignPopup'); 
}

// ----Function to close any popup
function closePopup(popupId) {
    document.getElementById(popupId).style.display = "none";
    document.body.classList.remove('blur'); 
}

// ---login

  function loginUser() {
    var username = document.querySelector("#LoginPopup input[name='username']").value;
    var password = document.querySelector("#LoginPopup input[name='password']").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                
                document.getElementById("loginButton").innerText = username;
                
                document.getElementById("LoginPopup").style.display = "none";
                document.getElementById("logoutButton").style.display = "block";
            } else {
                alert("Please enter valid account!");
            }
        }
    };
    var data = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
    xhr.send(data);
}
