<template>
  <novel-page type="search-view" title="图书搜索">
    <i slot="more" class="cubeic-home novel-home" @click="goHome"></i>
    <div slot="content">
      <cube-input v-model="keywords" :placeholder="placeholder" :maxlength="maxlength" :autofocus="autofocus"
                  :clearable="clearable" v-on:keyup.enter.native="search">
        <cube-button inline="true" slot="append" @click="search">Go</cube-button>
      </cube-input>

      <div class="result">
        <ul class="books">
          <li v-for="book in books" v-bind:key="book.link">
            <router-link :to="routerLink(book.link,book.name)" class="book-layout">
              <img src="https://bookcover.yuewen.com/qdbimg/349573/1011026048/150" alt="" class="book-cover">
              <div class="book-cell">
                <h3>{{ book.name }}<span class="status">{{ book.recent_date}}</span></h3>
                <h4>{{ book.author }}</h4>
                <p>{{ book.author}}</p>
                <div class="book-meta">
                  <span class="update">{{ book.update}}</span>
                  <span class="recent">{{ book.recent}}</span>
                </div>
              </div>
            </router-link>
          </li>
        </ul>
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
        keywords: null,
        placeholder: '请输入书名',
        maxlength: 50,
        autofocus: true,
        clearable: {
          visible: true,
          blurHidden: true
        },
        books: null
      }
    },
    methods: {
      search: function () {
        // 调用搜索接口
        if (this.keywords) {
          axios.get('/api/search', {params: {'keywords': this.keywords}})
              .then((response) => {
                this.books = response.data
              })
              .catch(function (error) {
                console.log(error)
              })
              .then(function () {
                // always executed
              })
        }
      },
      routerLink: function (path, title) {
        return {
          name: 'catalog',
          params: {
            'path': path,
            'title': title
          }
        }
      },
      goHome: function () {
        this.$router.push({name: 'home'})
      },
    },
    components: {
      NovelPage
    }
  }
</script>

<style lang="stylus" rel="stylesheet/stylus">
  .result
    font-size: 0.3rem
    margin: 0.5rem auto;

    ul.books li
      height: 4rem
      width: 100%
      margin-bottom: 0.3rem;
      padding-bottom: 0.3rem;
      border-bottom: 1px solid #a5cbdc;

    a.book-layout
      color: #735a10
      height: 100%;
      width: 100%;
      position: relative;
      display: block;
      overflow: hidden;
      transition-property: padding-left;
      transition-duration: 0.15s;
      transition-timing-function: ease;
      transition-delay: 0s;

    img.book-cover
      font-size: 0
      float: left
      height: 100%
      width: auto
      margin-right: 0.2rem
      box-shadow: 0 1px 3px rgba(0, 0, 0, .3)

    .book-cell
      overflow: hidden
      position: relative
      height: 100%

      h3
        font-size: 0.5rem
        line-height: 0.8rem
        height: 0.8rem
        overflow: hidden
        white-space: nowrap
        text-overflow: ellipsis

        .status
          font-size: 0.3rem

      h4
        line-height: 0.5rem
        height: 0.5rem
        overflow: hidden
        white-space: nowrap
        text-overflow: ellipsis

      p
        line-height: 0.4rem
        height: 2rem
        display: -webkit-box
        -webkit-box-orient: vertical
        -webkit-line-clamp: 5
        overflow: hidden

      .book-meta
        color: #ff9800
        position: absolute;
        bottom: 0;

        span
          display: inline-block
          margin-right: 0.1rem

</style>

