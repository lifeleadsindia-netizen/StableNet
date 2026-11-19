
"use strict"

// for show password 
let createpassword = (type, ele) => {
    let input = document.getElementById(type);
    if (!input) return;
    input.type = input.type === "password" ? "text" : "password";
    let icon = ele.querySelector("i") || (ele.childNodes && ele.childNodes[0]);
    if (icon && icon.classList) {
        if (icon.classList.contains("ri-eye-line")) {
            icon.classList.remove("ri-eye-line");
            icon.classList.add("ri-eye-off-line");
        }
        else {
            icon.classList.add("ri-eye-line");
            icon.classList.remove("ri-eye-off-line");
        }
    }
}