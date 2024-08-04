var nameInput = document.getElementById("inputName");
var submitButton = document.getElementById("submit");

nameInput.addEventListener("input", function() {
    var name = nameInput.value.trim();
    if (name === "") {
        submitButton.disabled = true;
    } else {
        submitButton.disabled = false;
    }
});
