export default class PokemonApi{
    constructor(){

    }

   async getAPokemon(index){
        const request = await fetch("https://pokeapi.co/api/v2/pokemon/"+index);
        const respons = await request.json();
        return respons;
    }

    async getFrenchNamePokemon(index){
        const request = await fetch('https://pokeapi.co/api/v2/pokemon-species/'+index);
        const respons = await request.json();
        return respons;
    }

}