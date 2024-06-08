 // Add event listeners to toggle product details
 const productCards = document.querySelectorAll('.product-card');
 productCards.forEach(card => {
     card.addEventListener('click', () => {
         const details = card.querySelector('.product-details');
         details.style.display = details.style.display === 'block' ? 'none' : 'block';
     });
 });