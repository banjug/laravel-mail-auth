<template>
    <div class="container">
        <div class="row justify-content-center">
           <ul class="list-group list-group-flush ">
               <li class="list-group-item mb-3" v-for="videogame, i in videogames" :key="i">
                   <h5>{{videogame.title}}</h5>
                   <p>{{videogame.subtitle}}</p>
                   <small>Rating: {{videogame.rating}}/5</small>
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
        mounted() {
            // chiamata api alla rotta api.games.list per ricevere i dati dei videogames tramite l'ApiController
            axios.get('/api/games/list')
            .then(r=>this.videogames = r.data)
            .catch(e=>console.log(e))
        }
    }
</script>
