<template>
  <div id="app">
    <novel-view></novel-view>
  </div>
</template>

<script type="text/ecmascript-6">
  import NovelView from './components/novel-view.vue'

  export default {
    data() {
      return {}
    },
    components: {
      NovelView
    }
  }
</script>

<style lang="stylus" rel="stylesheet/stylus">
  html, body, #app
    height: 100%

  body
    background-color: #fff
    overflow: hidden

  .novel-bar
    z-index: 10
    position: absolute
    right: 0
    left: 0
    height: 1rem
    line-height: 1rem
    text-align: center
    background-color: #EDF0F4
    box-shadow: 0 0.05rem 0.025rem #e9eaea
    -webkit-backface-visibility: hidden
    backface-visibility: hidden

    h1
      font-size: 0.5rem
      font-weight: 500

  .novel-content
    position: absolute
    top: 1rem
    left: 0
    right: 0
    bottom: 0
    overflow: scroll
    -webkit-overflow-scrolling: touch

</style>
