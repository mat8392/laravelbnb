import VueRouter from "vue-router";
import Bookables from "./bookables/Bookables";
import Bookable from "./bookable/Bookable";
import BookablesExample from "./bookables/BookablesExample";

const routes = [
    {
        path: "/",
        component: Bookables,
        // use in :to="{name: 'home'}"
        name: "home"
    },
    {
        path: "/bookable/:id",
        component: Bookable,
        name: "bookable",
    },
    {
        path: "/contoh",
        component: BookablesExample,
        name: "example",
    }
];

const router = new VueRouter({
    mode: "history", // remove /#/ in url
    routes // short for `routes: routes`
})

export default router;