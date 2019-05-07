import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Search from './views/Search.vue'
import Catalog from './views/Catalog.vue'
import Chapter from './views/Chapter.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      // 图书搜索
      path: '/search',
      name: 'search',
      component: Search
    },
    {
      // 图书目录
      path: '/catalog/:path',
      name: 'catalog',
      component: Catalog
    },
    {
      // 图书章节
      path: '/chapter/:path',
      name: 'chapter',
      component: Chapter
    }
  ]
})
