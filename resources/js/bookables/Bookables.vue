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
                    class="col d-flex align-items-strecth"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + column">
                    <bookable-list-item
                        v-bind="bookable"
                        >
                        <!-- v-bind="bookable" is shorthand for below -->
                        <!-- :title=bookable.title
                        :description=bookable.description
                        :price=bookable.id -->
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

           const request = axios.get("/api/bookables")
           .then(response => {
                this.bookables = response.data.data;
                this.bookables.push({ title: "x", description: "y" });
                this.loading = false;
            });

           console.log(request);

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