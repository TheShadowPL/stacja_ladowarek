function check(){
    pass1 = document.getElementById("pass1")
    pass2 = document.getElementById("pass2")
    errorsContainer = document.getElementById("errorsContainer")
    errorsContainer.innerHTML = "";
    let error = document.createElement('li')
    if (pass1.value != pass2.value) {
        error.innerHTML = "Hasła nie są jednakowe!";
    }
    errorsContainer.appendChild(error)
}



