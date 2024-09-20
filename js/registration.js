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

    // Adiciona a formatação para CPF
    if (cpf.length <= 3) {
        return cpf; // Retorna os primeiros 3 dígitos
    } else if (cpf.length <= 6) {
        return cpf.slice(0, 3) + '.' + cpf.slice(3); // Formato XXX.XXX
    } else if (cpf.length <= 9) {
        return cpf.slice(0, 3) + '.' + cpf.slice(3, 6) + '.' + cpf.slice(6); // Formato XXX.XXX.XXX
    } else {
        return cpf.slice(0, 3) + '.' + cpf.slice(3, 6) + '.' + cpf.slice(6, 9) + '-' + cpf.slice(9, 11); // Formato XXX.XXX.XXX-XX
    }
}

function aplicarMascaraCPF(event) {
    const input = event.target;
    const valor = input.value;
    input.value = formatarCPF(valor);
}

// Vincula a função de máscara ao evento input
document.addEventListener('DOMContentLoaded', function () {
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', aplicarMascaraCPF);
});
