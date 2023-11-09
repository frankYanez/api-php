const container = document.getElementById('juegos')
const onLoad = async () => {
    container.innerHTML = '<h1>Cargando...</h1>'
    const json = await fetch('http://localhost/proyectos/api/api/games')
    const games = await json.json()
    render(games)
}

const items = 2


const render = (games) => {
    container.innerHTML = ''
    games.splice(0, items).forEach(element => {
        const div = document.createElement('div')
        div.innerHTML = `<h2>${element.nombre}</h2>`
        container.appendChild(div)
    }
    );
}
onLoad()

