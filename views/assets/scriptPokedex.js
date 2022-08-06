import PokemonApi from "./classes/PokemonApi.js";

const pokemons = new PokemonApi();

const pokeContainer = document.querySelector('.all-pokemon-container');

function putNameInContainer(container,center, index){
    pokemons.getFrenchNamePokemon(index)
    .then(data =>{
        const name = document.createElement('span');
        name.textContent= data.names[4].name;
        center.append(name);
        container.append(center);
        pokeContainer.append(container);
    })
}

function pushInConatainer(data){
    const img = (data.sprites.versions['generation-v']['black-white'].animated.front_default != null ? data.sprites.versions['generation-v']['black-white'].animated.front_default : data.sprites.front_default);
    
    const centerContainer = document.createElement('div');
    const imgPoke = document.createElement('img');
    const num = document.createElement('span');
    const container = document.createElement('div');

    container.classList.add("smallPokemon");
    num.textContent ="N°" + (data.id > 99? data.id : (data.id < 10 ? "00"+data.id  : "0"+data.id ))
    imgPoke.classList.add("poke");
    centerContainer.classList.add('center');

    imgPoke.setAttribute('src',img)
    // imgPoke.setAttribute('width',50)
    centerContainer.append(imgPoke);
    centerContainer.append(num);
    putNameInContainer(container,centerContainer,data.id);
}

function getAllPokemon(){
    let i=1;
    do{
        pokemons.getAPokemon(i)
        .then(data => pushInConatainer(data));
        i++;
    }while(i<=913)
}

getAllPokemon();