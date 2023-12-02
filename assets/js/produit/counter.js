let quantity = document.getElementById("qty").value;

function updateQuntity(){
    document.getElementById("qty").value = quantity;
}

function increment(){
    quantity = document.getElementById("qty").value;
    if(quantity < 100){
        quantity ++;
        updateQuntity();
    }
}

function decrement(){
    quantity = document.getElementById("qty").value;
    if(quantity > 0){
        quantity --;
        updateQuntity();
    }
}