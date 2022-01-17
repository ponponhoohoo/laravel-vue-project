<template>
  <div>
    header {{mess}} {{ $store.state.message }}

    <!-- 入力ページへのリンク -->
    <router-link to="/article/">top</router-link>
    <router-link to="/article/input">登録</router-link>
  </div>
</template>

<script>
export default {
  name: 'Header',
  data () {
    return {
        articles: {},
        mess:"あああああああああああ",
    }
}
}

</script>