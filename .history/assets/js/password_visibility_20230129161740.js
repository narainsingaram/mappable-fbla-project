function togglePasswordVisibility() {
    const elements = [document.getElementById("reg_normal_password"), document.getElementById("reg_confirm_password")];
    elements.forEach(element => {
        element.type = element.type === "password" ? "text" : "password";
    });
}

const passwordInput = document.getElementById("change_password");
const passwordToggle = passwordInput.nextElementSibling;

passwordToggle.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggle.innerHTML = '<i class="text-2xl mx-2 uil uil-eye-slash"></i>';
  } else {
    passwordInput.type  "password";
    passwordToggle.innerHTML = '<i class="text-2xl mx-2 uil uil-eye"></i>';
  }
});