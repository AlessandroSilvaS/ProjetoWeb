document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os itens de menu que têm submenu
    const menuItems = document.querySelectorAll('.menu-item > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault(); // Previne o comportamento padrão do link

            // Seleciona o submenu correspondente
            const submenu = this.nextElementSibling;

            if (submenu && submenu.classList.contains('submenu')) {
                // Alterna a visibilidade do submenu
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            }
        });
    });
});