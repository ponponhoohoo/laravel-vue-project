import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import List from './components/List.vue'
import ArticleInputnput from './components/ArticleInput.vue'
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/article/',
    component: List
  },
  {
    path: '/article/Input',
    component: ArticleInputnput
  }
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
    mode: 'history',
    routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router