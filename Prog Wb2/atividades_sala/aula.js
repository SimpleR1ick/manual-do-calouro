document.addEventListener('DOMContentLoaded', function () {
	var elem = document.getElementById('exemplo1o1')
	elem.innerHTML = 'Olá mundo'

	const collection = document.getElementsByTagName('li')
	document.getElementById('demo').innerHTML = collection[1].innerHTML

	const colecao = document.getElementsByTagName('')
	let text = ''
	for (let i = 0; i < colecao.length; i++) {
		text += colecao[i].tagName + '<br>'
	}
})
