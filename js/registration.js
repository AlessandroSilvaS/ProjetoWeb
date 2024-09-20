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
function formatarCPF(cpf) {
    // Remove qualquer caractere que não seja número
    cpf = cpf.replace(/\D/g, '');

    // Adiciona a formatação
    if (cpf.length <= 3) {
        return cpf;
    } else if (cpf.length <= 6) {
        return cpf.slice(0, 3) + '.' + cpf.slice(3);
    } else if (cpf.length <= 9) {
        return cpf.slice(0, 3) + '.' + cpf.slice(3, 6) + '.' + cpf.slice(6);
    } else {
        return cpf.slice(0, 3) + '.' + cpf.slice(3, 6) + '.' + cpf.slice(6, 9) + '-' + cpf.slice(9, 11);
    }
}

function aplicarMascaraCPF(event) {
    const input = event.target;
    const valor = input.value;
    input.value = formatarCPF(valor);
}

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
