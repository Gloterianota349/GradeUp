const form = document.querySelector('form'); 
const inputs = document.querySelectorAll('form input');
const msgErro = document.querySelectorAll('.msg_erro');
const span = document.querySelector('span');

form.addEventListener('submit', (event) => {
    event.preventDefault()
    
    const ocultarErro = () => {
        msgErro.forEach((erro) => {
            erro.style.display = 'none';
        })
    }
    
    const validarDados = () => {
        let preenchido = true;
        
        inputs.forEach((entrada) => {
            if(entrada.value === ''){
                msgErro.forEach((campo) => {
                    campo.style.display = 'block';
                })
                preenchido = false        
        }
        entrada.addEventListener('input', () => {
            ocultarErro()
        })
    })
    return preenchido;
    }

    if(validarDados()){
        form.submit()
    }
})

span.addEventListener('click', () => {
    window.location.href = 'register.php';
})