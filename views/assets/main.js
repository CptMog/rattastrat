import PokemonApi from "./classes/PokemonApi.js";

const pokeApi = new PokemonApi();
const containerPokemons = document.querySelector('.team-container');

let pokemonBloc;
let imagePokemon;


function addNameToDom(index,containerDom){
    pokeApi.getFrenchNamePokemon(index)
    .then(data =>{
        const name = document.createElement('span');
        name.textContent = data.names[4].name;
        containerDom.append(name);  
        containerPokemons.append(containerDom);      
    })
}

for(let i=1; i<=6 ; i++){
    pokeApi.getAPokemon(i*99+33-55)
    .then(data => {
        pokemonBloc = document.createElement('div');
        pokemonBloc.classList.add('pokemon');
        pokemonBloc.setAttribute('data-id',data.id);
        imagePokemon = document.createElement('img');
        // namePokemon = document.createElement('span');

        imagePokemon.setAttribute('src',data.sprites.other["official-artwork"].front_default);
        imagePokemon.setAttribute('alt','pokemon');

        pokemonBloc.append(imagePokemon);
        addNameToDom(i*99+33-55,pokemonBloc);
    })
}

pokeApi.getAPokemon(200).then(data => console.log(data))

