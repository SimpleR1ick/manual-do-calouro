document.addEventListener('DOMContentLoaded', () => {
    class Carro {
        constructor(nome = 'Ferrari', cor = 'vermelho', ano = 2021) {
            this.nome = nome;
            this.cor = cor;
            this.ano = ano;
        }
        // Metodo idade
        idade() {
            let date = new Date();
            return date.getFullYear() - this.ano;
        }
    }

    let myCar = new Carro('Camaro', 'amarelo', 2016);
    document.getElementById('demo').innerHTML =
        `Meu carro é um(a) ${myCar.nome} de cor ${myCar.cor} e tem ${myCar.idade()} ano(s).`

    const meuCarro = {
        type: 'Fiat',
        model: '500',
        color: 'white',
        dscModelo: function () {
            return this.model;
        }
    };

    document.getElementById('demo1').innerHTML = `O meu carro é o ${meuCarro.type} ${meuCarro.dscModelo()}`;


    /*=========================================================*/


    do {
        var hora = prompt('Horas:')
    } while ((hora === '') || (hora > 24) || (hora < 0))

    var imprime = window.document.getElementById('demo');
    imprime.innerHTML = `Agora são ${hora} horas.`;


    /*=========================================================*/


    function hello(name) {
        let welcome = `Bem-vindo ${name}`;
        write(welcome, '');
    }

    function write(frase, tipo) {
        switch (tipo) {
            case 1:
                console.log(frase);
            case 2:
                alert(frase);
                break;
            default:
                document.write(frase);
        }
    }

    hello('Marta');
})


