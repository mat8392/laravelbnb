<template>
    <div>
        <div v-if="loading">
            Data is loading
        </div>
        <!-- to avoid v-if and v-for conflict -->
        <div v-else>
            <!-- :key need to be unique -->
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">

                <div
                    class="col"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + column">
                    <bookable-list-item
                        :item-title=bookable.title
                        :item-content=bookable.content
                        :price="10001"
                        >
                        <!-- v-for need bind key with index but if have id can use id -->
                    </bookable-list-item>
                </div>
                <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
            </div>
        </div>

    </div>
</template>

<script>
    import BookableListItem from "./BookableListItem";

    export default {
        components: {
            BookableListItem
        },
        // beforeCreate() {
        //     console.log("beforeCreate");
        // },
        created() {
            console.log("created");
            this.loading = true;

            const p = new Promise((resolve, reject) => {
                console.log(resolve);
                console.log(reject);

                setTimeout(() => resolve("Hello"), 300);
            })
            .then(result => console.log(`success2 ${result}`))
            .then(result => console.log(`success ${result}`))
            .catch(result => console.log(`error ${result}`));

            console.log("cis");
            console.log(p);

            setTimeout(() => {
                this.bookables = [
                    {
                        title: "Cheap VIlla !!!",
                        content: "A very Cheap villa"
                    },
                    {
                        title: "Cheap VIlla 2 !!",
                        content: "A very Cheap villa 2 !!"
                    },
                    {
                        title: "Cheap VIlla 3 !!",
                        content: "A very Cheap villa 3 !!"
                    },
                    {
                        title: "Cheap VIlla 4 !!",
                        content: "A very Cheap villa 4 !!"
                    },
                    {
                        title: "Cheap VIlla 5 !!",
                        content: "A very Cheap villa 5 !!"
                    },
                    {
                        title: "Cheap VIlla 6 !!",
                        content: "A very Cheap villa 6 !!"
                    },
                    {
                        title: "Cheap VIlla 7 !!",
                        content: "A very Cheap villa 7 !!"
                    }
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
                loading: false, //this one common for login
                columns: 3
                //bookable3 not reactive
            }
        },
        computed: {
            rows() {
                return  this.bookables == null ? 0 : Math.ceil(this.bookables.length / this.columns);
            }
        },
        methods: {
            bookablesInRow(row) {
                return this.bookables.slice((row - 1) * this.columns, row * this.columns);
            },
            placeholdersInRow(row) {
                return this.columns - this.bookablesInRow(row).length;
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