<template>
  <novel-page type="chapter-view" :title="title">
    <i slot="more" class="cubeic-more novel-home" @click="goCatalog"></i>
    <div slot="content">
      <div class="chapter">
        <article class="chapter-article">
          <p v-for="row in article">{{ row }}</p>
        </article>
        <div class="next" v-if="next">
          <router-link :to="routerLink(next)" class="chapter-li-a">下一章</router-link>
        </div>
      </div>
    </div>
  </novel-page>
</template>

<script type="text/ecmascript-6">
  import NovelPage from '../components/novel-page'
  import axios from 'axios'

  export default {
    data() {
      return {
        title: '', // 章节名
        article: [], // 正文
        next: '' // 下一章
      }
    },
    created: function () {
      console.log(this.$route.params)
      this.chapter(this.$route.params.path)
    },
    methods: {
      routerLink: function (path) {
        return {
          name: 'chapter',
          params: {
            'path': path
          }
        }
      },
      goCatalog: function () {
        this.$router.push({name: 'catalog', params: {'path': this.$route.params.catalog_path}})
      },
      chapter: function (path) {
        axios.get('/api/chapter', {
          params: {
            'path': path,
          }
        }).then((response) => {
          this.article = response.data.article
          this.next = response.data.next
          this.title = response.data.title
          document.getElementsByClassName('wrapper')[0].scrollTop = 0
        }).catch(function (error) {
          console.log(error)
        }).then(function () {
        })
      }
    },
    watch: {
      '$route'(to) {
        this.chapter(to.params.path)
      }
    },
    components: {
      NovelPage
    }
  }
</script>

<style lang="stylus" rel="stylesheet/stylus">
  .chapter-view
    background: url(../assets/skin-default-t.ece62.jpg) no-repeat center top, url(../assets/skin-default-b.79f06.jpg) no-repeat center bottom, url(../assets/skin-default-m.35905.jpg) repeat-y center 119px;
    background-size: 100%

  div.chapter
    .chapter-article
      font-size: 0.4rem
      line-height: 0.7rem
      overflow: hidden
      text-align: justify

      p
        margin: 0.1rem 0
        word-break: break-all

    .next
      position: relative;
      right: 0;
      left: 0;
      overflow: hidden;
      text-align: center;

      a
        color: white
        background-color: red
        width: 7rem
        font-size: 0.4rem
        line-height: 0.8rem
        border-radius: 0.5rem
        display: inline-block


</style>

