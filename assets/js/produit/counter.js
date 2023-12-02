let quantity = 0;

function updateQuntity(){
    document.getElementById("qty").value = quantity;
}

function increment(){
    quantity ++;
    updateQuntity();
}

function decrement(){
    if(quantity > 0){
        quantity --;
        updateQuntity();
    }
}