<template>
  <novel-page type="catalog-view" :title="title">
    <div slot="content">
      <div class="wrapper">
        <div class="catalog">
          <div class="catalog-header">
            <span class="total">共 xxx 章</span>
            <span class="reverse" @click="reverse">{{ order }}</span>
          </div>
          <div class="catalog-chapters">
            <ul class="chapters-ul">
              <li class="chapter-li" v-for="chapter in catalog">
                <router-link :to="routerLink(chapter.link)" class="chapter-li-a">{{chapter.name}}</router-link>
              </li>
            </ul>
          </div>
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
        title: '绿茵峥嵘',
        order: '倒序',
        catalog: []
      }
    },
    created: function () {
      axios.get('/api/catalog', {params: {'path': this.$route.params.path}})
          .then((response) => {
            this.catalog = response.data
          })
          .catch(function (error) {
            console.log(error)
          })
          .then(function () {
            // always executed
          })
    },
    methods: {
      reverse: function () {
        this.catalog.reverse()
        this.order == '正序' ? this.order = '倒序' : this.order = '正序'
      },
      routerLink: function (path) {
        return {
          name: 'chapter',
          params: {
            'path': path
          }
        }
      },
    },
    components: {
      NovelPage
    }
  }
</script>

<style lang="stylus" rel="stylesheet/stylus">
  .catalog
    .catalog-header::after
      display: block;
      margin-left: 0.1rem;
      content: '';
      transform: scaleY(.75);
      border-top: 1px solid #0c5460;

    .catalog-header
      position: relative

      .total
        font-weight: 600
        display: inline-block
        padding: 0.3rem 0.1rem

      .reverse
        display: inline-block
        float: right
        white-space: nowrap
        padding: 0.3rem 0.1rem

    .chapters-ul
      .chapter-li::after
        display: block;
        margin-top: -1px;
        margin-left: 0.2rem;
        content: '';
        transform: scaleY(.75);
        border-top: 1px solid #ff9800;

      .chapter-li-a
        color: #33373d
        font-weight: 500
        line-height: 0.4rem;
        display: block;
        overflow: hidden;
        padding: 0.2rem 0.1rem;
        white-space: nowrap;
        text-overflow: ellipsis;

</style>

