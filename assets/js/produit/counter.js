document.addEventListener('DOMContentLoaded',function(){
    
    const productsCards = document.querySelectorAll('.prodCard');
    
    productsCards.forEach(function(card){
        let quantity = 0;
        const quantityElement = card.querySelector('.quantity');
        const incrementButton = card.querySelector('.increment');
        const decrementButton = card.querySelector('.decrement');

        incrementButton.addEventListener('click',function(){
            quantity++;
            updateQuantity();
        });

        decrementButton.addEventListener('click',function(){
            if(quantity > 0){
                quantity--;
                updateQuantity();
            }
        });

        function updateQuantity(){
            quantityElement.value = quantity;
        }

    });
});