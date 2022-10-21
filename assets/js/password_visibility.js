function togglePasswordVisibility() {
    let toggle_normal_password = document.getElementById("reg_normal_password");
    let toggle_confirm_password = document.getElementById("reg_confirm_password");
    if (toggle_normal_password.type === "password") {
        toggle_normal_password.type = "text";
    } else {
        toggle_normal_password.type = "password";
    }
    if (toggle_confirm_password.type === "password") {
        toggle_confirm_password.type = "text";
    } else {
        toggle_confirm_password.type = "password";
    }
}
