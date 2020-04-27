import VueRouter from "vue-router";
import Bookables from "./bookables/Bookables";
import BookablesExample from "./bookables/BookablesExample";
import Example2 from "./components/Example2";

const routes = [
    {
        path: "/",
        component: Bookables,
        // use in :to="{name: 'home'}"
        name: "home"
    },
    {
        path: "/contoh",
        component: BookablesExample,
        name: "example",
    },
    {
        path: "/second",
        component: Example2,
        name: "second",
    }
];

const router = new VueRouter({
    mode: "history", // remove /#/ in url
    routes // short for `routes: routes`
})

export default router;