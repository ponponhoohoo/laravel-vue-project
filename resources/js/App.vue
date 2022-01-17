<template>
  <div>
    <main>
      <div class="container">
        <Header/>
        <RouterView />
        <Footer/>
      </div>
    </main>
  </div>
</template>

<script>
import Header from './components/Header'
import Footer from './components/Footer'

export default {
  name: 'App',
  components: {
    Header,
    Footer
  }
}
</script>