const pesoInput = document.querySelector("#peso")

function validarDigitos(valor) {
   return valor.replace(/^,|[^0-9,]/g, "")
}

pesoInput.addEventListener("input", (event) => { //Toda vez que for "escutado" um input feito pelo usuário, será executada uma função que recebe um event (e) como parâmetro. "Event" é um objeto que possui diversas propriedades, como "target", que serve para mostrar quem foi o alvo do evento que procuramos (neste caso, o input do usuário). Em outras palavras, "target" exibe exatamente onde o evento ocorreu.

        const valorInputado = validarDigitos(event.target.value) //Atribuímos a valorInputado o valor retornado pela função validarDigitos depois de tratado o que foi digitado pelo usuário, que pode ser encontrado com "event.target.value".
        //"event.target.vlaue": estamos acessando o objeto "event", depois a sua propriedade target, depois o valor que está contido dentro de target. Este valor está sendo tratado pela função validarDigitos, permitindo apenas a inserção de números e vírgula.

        // Prints no console para ajuda na compreensão do código
        // console.log(event.target.value)
        // console.log(valorInputado)

        event.target.value = valorInputado //Atribuímos a event.target.value o valor em valorInputado. Isso é essencial para que a validação funcione e tenhamos apenas números e vírgula inseridos no input porque, caso seja inserida uma letra, a função validarDigitos(event.target.value) irá retornar um valor vazio ("") que será atribuído para valorInputado que, por sua vez, ao ser atribuído para event.target.value, irá transformar toda letra digitada pelo usuário em "" (vazio). 

        // Prints no console para ajuda na compreensão do código
        // console.log(event)
        // console.log(event.target)
        // console.log(event.target.value)
        // console.log(valorInputado)
        // console.log(pesoInput)
    })