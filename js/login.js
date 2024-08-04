var nameInput = document.getElementById("input-name");
var submitButton = document.getElementById("info-submit");

nameInput.addEventListener("input", function() {
    var name = nameInput.value.trim();
    if (name === "") {
        submitButton.disabled = true;
    } else {
        submitButton.disabled = false;
    }
});



var selectedCategory = null;
// Get all category images and add click event listeners
var categoryImages =document.querySelectorAll(".cat_image");

categoryImages.forEach(function(image) {
    image.addEventListener("click", function() {
        // Remove the "selected" class from all images
        categoryImages.forEach(function(imgs) {
            imgs.classList.remove("selected");
        });

        // Add the "selected" class to the clicked image
        this.classList.add("selected");

        // Store the selected category in the variable
        selectedCategory = this.getAttribute("data-category");
    });
});

// Add a click event listener to the submit button
function validate() {
    if (selectedCategory) {
        switch (selectedCategory) {
            case "category1":
                document.getElementById("cat_id").value = 1; 
                return true;
            case "category2":
                document.getElementById("cat_id").value = 2; 
                return true;;
            case "category3":
                document.getElementById("cat_id").value = 3;
                return true;;
            default:
                alert("Please select a valid category.");
                return false;
        }
    } else {
        alert("Please select a category before submitting.");
        return false;
    }
};

