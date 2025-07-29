const form = document.querySelector('form')
const inputs = document.querySelectorAll('input')
const erro = document.querySelectorAll('.CampoObrigatorio')
const cadastre = document.querySelector('span') 

form.addEventListener('submit', (event) =>{
    event.preventDefault()

    const ocultarerro = () => {
        erro.forEach((campo) => {
            campo.style.display = 'none'
        })
    }

    const validardados  = () => {
        let preenchido = true

        inputs.forEach((entrada) => {
            if(entrada.value === ''){
                erro.forEach((campo) => {
                    campo.style.display = 'block'
                })
                preenchido = false
            }

            entrada.addEventListener('input', () => {
                ocultarerro()
            })
        })
        return preenchido
    }

    if(validardados()){
        form.submit()
    }
})