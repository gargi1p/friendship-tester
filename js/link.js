function copyToClipboard() {
    // Get the text field
    var copyText = document.getElementById("quiz-link");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999);

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    alert("Link copied to clipboard");
}