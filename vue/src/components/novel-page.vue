<template>
  <div class="novel-page" :class="type">
    <header class="header">
      <h1>{{title}}</h1>
      <i @click="back" class="cubeic-back"></i>
      <slot name="more" class="novel-home"></slot>
    </header>
    <div class="wrapper">
      <section v-show="desc" class="desc">
        <slot name="desc">{{desc}}</slot>
      </section>
      <main class="content">
        <slot name="content">{{content}}</slot>
      </main>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    props: {
      title: {
        type: String,
        default: '',
        required: true
      },
      type: {
        type: String,
        default: ''
      },
      desc: {
        type: String,
        default: ''
      },
      content: {
        type: String,
        default: ''
      }
    },
    methods: {
      back() {
        this.$router.back()
      }
    }
  }
</script>

<style lang="stylus" rel="stylesheet/stylus">
  .novel-page
    position: absolute
    z-index: 10
    top: 0
    left: 0
    width: 100%
    height: 100%
    background: #efeff4

    .header
      position: relative
      height: 1rem
      line-height: 1rem
      text-align: center
      background-color: #edf0f4
      box-shadow: 0 0.025rem 0.15rem #ccc
      -webkit-backface-visibility: hidden
      backface-visibility: hidden
      z-index: 5

      h1
        font-size: 0.4rem
        font-weight: 700

      .cubeic-back
        position: absolute
        top: 0
        left: 0
        padding: 0 0.4rem
        color: #fc9153
        font-size: 0.5rem

      .novel-home
        position: absolute
        top: 0
        right: 0
        padding: 0 0.4rem
        color: #fc9153
        font-size: 0.5rem

    > .wrapper
      height: calc(100% - 44px)
      overflow-x: hidden
      overflow-y: auto
      -webkit-overflow-scrolling: touch

      .desc
        padding: 0.25rem
        margin: 0.25rem
        line-height: 0.5rem
        font-size: 0.3rem

      .content
        margin: 0.25rem
        font-size: 0.3rem
</style>
