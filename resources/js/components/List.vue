<template>
    <div>
        <h1>List</h1>
        <ul>
            <li v-for="item in articles">
                {{ item.title }} {{ item.category.name }} <button @click="ShowTitle(item.title)">ShowTitle</button> 
            </li>
        </ul>
        <button @click="countUp">Count</button> {{name}}
    </div>
</template>

<script>
    import Header from './Header.vue'

    export default {
        name: 'List',
        components: {
            Header
        },
        data () {
            return {
                articles: {},
                mess:"mess",
                name:"初期",
            }
        },
        computed: {
            username() {
                return this.$store.getters.user.name
            },
        },
        created: function() {
            this.getBook();
        },

        methods: {
            getBook() {
                axios
                .get("/api/article/")
                .then(response => {
                    this.articles = response.data;
                    console.log(this.articles);
                    
                })
                .catch(err => {
                    this.message = err;
                });
            },
            countUp: function() {
                this.$store.commit('setUser' , 'hamamama')
                this.$store.commit('setAuth' , 'nhnhnhnhnhnhnh')
                this.name = this.$store.getters.user.name
                console.log(this.$store.getters.user.auth)
                return this.name
            },
            ShowTitle: function(ttl) {
                this.$store.commit('setUser' , ttl)
                this.name = this.$store.getters.user.name
                return this.name
            }
        }
    }
</script>