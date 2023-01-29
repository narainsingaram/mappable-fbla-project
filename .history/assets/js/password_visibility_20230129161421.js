function togglePasswordVisibility() {
    const elements = [document.getElementById("reg_normal_password"), document.getElementById("reg_confirm_password")];
    elements.forEach(element => {
        element.type = element.type === "password" ? "text" : "password";
    });
}

function toggle