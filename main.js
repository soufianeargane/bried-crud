function confirmId(id){
    document.getElementById("input-hidden").value = id;
}

function update(id){
    document.getElementById("edit-id").value = id;
    let name = document.getElementById(id).getAttribute("data-name");
    document.getElementById("product-name").value = name;
    let price = document.getElementById(id).getAttribute("data-price");
    document.getElementById("product-price").value = price;
    let category = document.getElementById(id).getAttribute("data-category");
    document.getElementById("product-category").value = category;
    let quantity = document.getElementById(id).getAttribute("data-quantity");
    document.getElementById("product-quantity").value = quantity;
    let details = document.getElementById(id).getAttribute("data-details");
    document.getElementById("product-details").value = details;
    let image = document.getElementById(id).getAttribute("data-image");
    ///////////////
    // const fileInput = document.querySelector('input[type="file"]');
    
    //     // Create a new File object
    //     // const myFile = new File([], image, {
    //     //     type: 'text/plain',
    //     //     lastModified: new Date(),
    //     // });
    //     // // Now let's create a DataTransfer to get a FileList
    //     // const dataTransfer = new DataTransfer();
    //     // dataTransfer.items.add(myFile);
    //     // fileInput.files = dataTransfer.files;
    
    document.getElementById("task-save-btn").style.display = 'none';
    document.getElementById("update-btn").style.display = 'block';
    document.getElementById("modal-title").innerHTML = 'Edit product'
}

function addProduct() {
    document.getElementById("task-save-btn").style.display = 'block';
    document.getElementById("update-btn").style.display = 'none';
    document.getElementById("modal-title").innerHTML = 'Add product';
    document.getElementById("product-form").reset();
}
