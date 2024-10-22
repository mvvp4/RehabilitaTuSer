const faqButtons = document.querySelectorAll('.faq-question');
  
faqButtons.forEach(button => {
  button.addEventListener('click', () => {
    const faqItem = button.parentElement;

    //se alterna la caractequisita active
    faqItem.classList.toggle('active');
  });
});