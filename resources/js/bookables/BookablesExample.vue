<template>
    <div>
        <div v-if="loading">
            Data is loading
        </div>
        <!-- to avoid v-if and v-for conflict -->
        <div v-else>
            <bookable-list-item-example
                :item-title=bookable.title
                :item-content=bookable.content
                :price="10001"
                v-for="(bookable, index) in bookables"
                :key="index"
                >
                <!-- v-for need bind key with index but if have id can use id -->
            </bookable-list-item-example>
        </div>
        
    </div>
</template>

<script>
    import BookableListItemExample from "./BookableListItemExample";

    export default {
        components: {
            BookableListItemExample
        },
        // beforeCreate() {
        //     console.log("beforeCreate");
        // },
        created() {
            console.log("created");
            this.loading = true;
            setTimeout(() => {
                this.bookables = [
                    {
                        title: "Cheap VIlla !!!xxx",
                        content: "A very Cheap villa xxx"
                    },
                    {
                        title: "Cheap VIlla 2 !!xxx",
                        content: "A very Cheap villa 2xxx"
                    },
                ];
            }, 2000);
            this.loading = false;
            // setTimeout(() => {
            //     console.log("First");
            //     this.bookable1.title = "You will see this ~~";
            // }, 8000);
        },
        
        data() {
            return {
                bookables: null, //reactive
                loading: false //this one common for login
                //bookable3 not reactive
            }
        },
        // beforeMount() {
        //     console.log("beforeMount");
        // },
        mounted() {
            console.log("mounted");
        },
        // beforeDestroy() {
        //     console.log("beforeDestroy");
        // },
        // destroyed() {
        //     console.log("destroyed");
        // }
    };
</script>