document.addEventListener("DOMContentLoaded", function() {
    const Boxes = document.querySelectorAll('.products_box-card');

    Boxes.forEach(box => {
        box.style.display = 'block';
    });

    const filterButtons = document.querySelectorAll('.products_button');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const idType = button.getAttribute('data-id-type');
            
            Boxes.forEach(box => {
                box.style.display = 'none';
            });

            Boxes.forEach(box => {
                if (box.getAttribute('data-id-type') === idType) {
                    box.style.display = 'block';
                }
            });
            filterButtons.forEach(btn => {
                if (btn === button) {
                    btn.style.backgroundColor = '#DA0463'; 
                } else {
                    btn.style.backgroundColor = ''; 
                }
            });
        });
    });
});