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

        <input @change="fileSelect" type="file">
        <ul v-if="this.errors.imgpath == true">
          <li v-for="item in this.messages.imgpath">{{item}}</li>
        </ul>
        <span v-for="item in this.categories">
            <input type="radio" v-model="forms.category" v-bind:value="item.id"><label>{{ item.name }}</label>
        </span>
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
        imgpath:"",
        error_flg:false,
        errors: {
          title: false,
          content: false,
          category: false,
          imgpath: false,
        },
        messages: {
          title: false,
          content: false,
          category: false,
          imgpath: false,
        },
        forms: {
          title: "",
          content: "",
          category: "",
          imgpath:"",
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
        fileSelect: function(e) {
            //選択したファイルの情報を取得しプロパティにいれる
            this.imgpath = e.target.files[0];
            console.log(this.imgpath)
        },
        getCategory() {
            axios
            .get("/api/category/")
            .then(response => {
                this.categories = response.data;
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

        let formData = new FormData();
        //appendでデータを追加(第一引数は任意のキー)
        //他に送信したいデータがある場合にはその分appendする
        formData.append('title',this.forms.title);
        formData.append('content',this.forms.title);
        formData.append('category',this.forms.category);
        formData.append('imgpath',this.imgpath);

        let config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        };

        // 送信処理
        axios.post('/api/article', formData,config)
        .then((res) => {
          let response = res.data;
          console.log(response)
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