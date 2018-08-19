import Vue from 'vue'
import VueRouter from 'vue-router'
import Layout from 'components/layout'
import FoodList from 'components/food-list/index'
import NotFoundComponent from 'components/not-found-component'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'main',
            component: Layout,
            children: [
                {
                    path: 'food-list',
                    name: 'food-list',
                    component: FoodList
                }
            ]
        },
        { path: '*', component: NotFoundComponent }

    ]
})

router.beforeEach((to, from, next) => {
    console.info('before each')
    next()
})

export default router
