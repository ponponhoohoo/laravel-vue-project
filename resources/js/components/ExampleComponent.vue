<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    @{{mess}}
                    <div class="card-body">
                        I'm an example component.sss<button @click="countUp">Count</button>
                        <p>{{ n }}</p>
                    </div>
                </div>
                <ul id="example-1">
                  <li v-for="item in items">
                   {{ item.title }}
                  </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        name: 'example-component',
        data () {
            return {
                articles: {},
                mess:"mess",
                n:1,
            }
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
                this.n += 1
            }
        }
    }
</script>
