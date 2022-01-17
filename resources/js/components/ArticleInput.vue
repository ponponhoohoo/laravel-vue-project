<template>
  <div>
    <h2>ArticleInput</h2>
    <p>ArticleInputです。</p>
    <!-- 名前フォーム -->
    <div class="form-name">
        <p>名前</p>
        <input type="text" placeholder="名前を入力してください" v-model="forms.title">
        <p v-if="this.errors.title == true">{{this.messages.title}}</p>
        <input type="text" placeholder="名前を入力してください" v-model="forms.content">
        <p v-if="this.errors.content == true">{{this.messages.content}}</p>
        <input type="text" placeholder="名前を入力してください" v-model="forms.category">
        <p v-if="this.errors.category == true">{{this.messages.category}}</p>
        <button @click="send()">送信する</button>

        <p v-if="this.error_flg == true">入力に誤りがありました。</p>
<!--         <ul v-if="Object.keys(this.messages).length">
          <li v-for="(value, key) in resultKey">
            {{ key }} is {{ value }}
          </li>
        </ul> -->
    </div>
  </div>
</template>

<script>

export default {
  name: 'ArticleInput',
  data() {
      return {
        title:"",
        content:"",
        category:"",
        categories: {},
        error_flg:false,
        errors: {
          title: false,
          content: false,
          category: false,
        },
        messages: {
          title: false,
          content: false,
          category: false,
        },
        forms: {
          title: "",
          content: "",
          category: "",
        },
      }
    },
    created: function() {
        this.getCategory();
    },
    methods: {
        test: function() {
            this.title = "inoue"
            return this.title
        },
        getCategory() {
            axios
            .get("/api/category/")
            .then(response => {
                this.categories = response.data;
                console.log(this.categories);
                
            })
            .catch(err => {
                this.message = err;
            });
        },
        send: function() {
        // 全てのエラーをリセット
        // Obj型式をループする際はこれを使用する
        Object.keys(this.errors).forEach((key) => {
          this.errors[key] = false;
          this.messages[key] = null;
        })
        // 送信処理
        axios.post('/api/article', this.forms)
        .then((res) => {
          let response = res.data;
          //console.log(response);
          if (response.status == 400) {
            // バリデーションエラー
            this.error_flg = true;
            Object.keys(response.errors).forEach((key) => {
              this.errors[key] = true;
              this.messages[key] = response.errors[key];
              console.log(response.errors[key]);
              // Object.keys(key).forEach(function (mes) {
              //   console.log(mes);
              // });
            })
          } else {
            this.error_flg = false;
            clearError(title);
            clearError(content);
            clearError(category);
            
            console.log(this.messages)
            // 成功したらUserItemコンポーネントを表示
          //  this.$router.push('/user/item');
          }
        })
        .catch((error) => {
          console.log(error.response)
        })
      },
      // 各エラーのリセット
      clearError(item) {
        this.errors[item] = false;
        this.messages[item] = null;
      },
    }
}
</script>