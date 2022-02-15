<template>
    <div class="container">
        <div class="row justify-content-center">
           <ul class="list-group list-group-flush ">
               <li class="list-group-item mb-3" v-for="videogame, i in videogames" :key="i">
                   <h5>{{videogame.title}}</h5>
                   <p>{{videogame.subtitle}}</p>
                   <small>Rating: {{videogame.rating}}/5</small>
                   <div class="row justify-content-end">
                       <!-- eliminazione con href(ricarica la pagina ) -->
                       <!-- <a :href="`/api/games/delete/${videogame.id}`" class="btn btn-danger btn-sm m-3">DELETE</a> -->
                       <!-- eliminazione con method di vue(non ricarica la pagina ) -->
                       <a @click="gameDelete(videogame.id)" class="btn btn-danger btn-sm m-3">DELETE</a>
                   </div>
               </li>
           </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                videogames: []
            };
        },
        methods: {
            gameDelete(id) {
                axios.get(`api/games/delete/${id}`)
                    .then(r=>{
                        // trovo la posizione dell'elemento che voglio eliminare con la funzione trova id e faccio lo splice nell'array
                        const index=this.getIndexById(id);
                        this.videogames.splice(index, 1);
                    })
                    .catch(e=>console.log(e))
            },
            getIndexById(id) {
                // funzione che ritrova la posizione nell'array di videogiochi a seconda dell'id input
                for (let i = 0; i < this.videogames.length; i++) {
                    const videogame = this.videogames[i];
                    if (videogame.id == id) {
                        return i;
                    }                    
                }
                return -1;
            }
        },
        mounted() {
            // chiamata api alla rotta api.games.list per ricevere i dati dei videogames tramite l'ApiController
            axios.get('/api/games/list')
                .then(r=>this.videogames = r.data)
                .catch(e=>console.log(e))
        }
    }
</script>
